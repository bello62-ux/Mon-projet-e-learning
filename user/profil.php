<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Inclure la configuration de la base de données
require_once '../config/db.php';

$user_id = $_SESSION['user_id'];

// Inclure la vérification d'authentification
require_once '../config/check_auth.php';

// Forcer la connexion - redirige vers login si non connecté
requireLogin();

// Le reste du code de profil.php continue ici...

// ... (la suite de votre code)

// Récupérer les informations de l'utilisateur
$sql = "SELECT user_id, first_name, last_name, email, birthday, telephone, is_admin, is_active, classroom_id, date_creation FROM users WHERE user_id = ? AND is_active = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Vérifier si l'utilisateur existe et est actif
if (!$user) {
    session_destroy();
    header("Location: ../index.php");
    exit();
}

// Nom complet
$full_name = $user['first_name'] . ' ' . $user['last_name'];
$email = $user['email'];
$birthday = $user['birthday'] ? date('d/m/Y', strtotime($user['birthday'])) : 'Non renseigné';
$telephone = $user['telephone'] ?: 'Non renseigné';
$date_inscription = date('d/m/Y', strtotime($user['date_creation']));
$classroom_id = $user['classroom_id'];

// Déterminer le niveau scolaire à partir de classroom_id (à adapter selon votre logique)
$niveau = '';
switch($classroom_id) {
    case 1:
        $niveau = 'CM2';
        break;
    case 2:
        $niveau = '3ème';
        break;
    case 3:
        $niveau = 'Terminale';
        break;
    default:
        $niveau = 'Non défini';
}

// Récupérer les cours terminés (à adapter selon votre schéma)
$sql_progress = "SELECT COUNT(*) as total FROM progress_lessons WHERE user_id = ?";
$stmt_progress = $conn->prepare($sql_progress);
$stmt_progress->bind_param("i", $user_id);
$stmt_progress->execute();
$result_progress = $stmt_progress->get_result();
$row_progress = $result_progress->fetch_assoc();
$nb_cours_termines = $row_progress['total'] ?? 0;

// Compter le total des cours pour le niveau (à adapter selon votre schéma)
$sql_total = "SELECT COUNT(*) as total FROM lessons WHERE classroom_id = ?";
$stmt_total = $conn->prepare($sql_total);
$stmt_total->bind_param("i", $classroom_id);
$stmt_total->execute();
$result_total = $stmt_total->get_result();
$total_cours = $result_total->fetch_assoc()['total'] ?: 0;

// Calculer le pourcentage de progression
$pourcentage = ($total_cours > 0) ? min(round(($nb_cours_termines / $total_cours) * 100), 100) : 0;

// Fermeture des requêtes
$stmt->close();
$stmt_progress->close();
$stmt_total->close();
$conn->close();

// Icône et couleur selon le niveau
$niveau_icons = [
    'CM2' => '🎒',
    '3ème' => '📚',
    'Terminale' => '🎓'
];
$niveau_colors = [
    'CM2' => '#e74c3c',
    '3ème' => '#3498db',
    'Terminale' => '#2ecc71'
];
$icon = $niveau_icons[$niveau] ?? '👤';
$color = $niveau_colors[$niveau] ?? '#34495e';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - <?php echo htmlspecialchars($full_name); ?></title>
    <link rel="stylesheet" href="../asset/css/profil.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header" style="background-color: <?php echo $color; ?>;">
            <div class="avatar">
                <?php echo $icon; ?>
            </div>
            <div class="welcome-message">Bienvenue sur ton profil</div>
            <div class="user-name"><?php echo htmlspecialchars($full_name); ?></div>
            <div class="user-level">Niveau : <?php echo $niveau; ?></div>
        </div>

        <div class="profile-content">
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-label">📧 Email</div>
                    <div class="info-value"><?php echo htmlspecialchars($email); ?></div>
                </div>
                <div class="info-card">
                    <div class="info-label">📞 Téléphone</div>
                    <div class="info-value"><?php echo htmlspecialchars($telephone); ?></div>
                </div>
                <div class="info-card">
                    <div class="info-label">🎂 Date de naissance</div>
                    <div class="info-value"><?php echo $birthday; ?></div>
                </div>
                <div class="info-card">
                    <div class="info-label">🎓 Niveau scolaire</div>
                    <div class="info-value"><?php echo $niveau; ?></div>
                </div>
                <div class="info-card">
                    <div class="info-label">📅 Date d'inscription</div>
                    <div class="info-value"><?php echo $date_inscription; ?></div>
                </div>
                <?php if ($user['is_admin']): ?>
                <div class="info-card">
                    <div class="info-label">👑 Statut</div>
                    <div class="info-value">Administrateur</div>
                </div>
                <?php endif; ?>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $nb_cours_termines; ?></div>
                    <div class="stat-label">Cours terminés</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $total_cours; ?></div>
                    <div class="stat-label">Cours disponibles</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $pourcentage; ?>%</div>
                    <div class="stat-label">Progression</div>
                    <div class="progress-bar-container">
                        <div class="progress-bar" style="width: <?php echo $pourcentage; ?>%; background-color: <?php echo $color; ?>;"></div>
                    </div>
                </div>
            </div>

            <div class="chapitres-section">
                <h3>📖 Mes cours complétés</h3>
                <div class="chapitres-list">
                    <?php if ($nb_cours_termines > 0): ?>
                        <?php
                        // Récupérer les détails des cours terminés
                        $sql_details = "SELECT l.title, l.duree, pl.date_completion 
                                       FROM progress_lessons pl 
                                       JOIN lessons l ON pl.lesson_id = l.lesson_id 
                                       WHERE pl.user_id = ? 
                                       ORDER BY pl.date_completion DESC 
                                       LIMIT 10";
                        $stmt_details = $conn->prepare($sql_details);
                        $stmt_details->bind_param("i", $user_id);
                        $stmt_details->execute();
                        $result_details = $stmt_details->get_result();
                        while ($cours = $result_details->fetch_assoc()):
                        ?>
                            <div class="chapitre-item">
                                <strong><?php echo htmlspecialchars($cours['title']); ?></strong><br>
                                <small>Durée : <?php echo htmlspecialchars($cours['duree']); ?></small><br>
                                <em>Terminé le : <?php echo date('d/m/Y', strtotime($cours['date_completion'])); ?></em>
                            </div>
                        <?php endwhile; ?>
                        <?php $stmt_details->close(); ?>
                    <?php else: ?>
                        <div class="chapitre-item">Aucun cours complété pour le moment</div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="actions">
                <a href="../../user/cours.php" class="btn btn-primary">📚 Accéder aux cours</a>
                <a href="../authentification/logout.php" class="btn btn-logout">🚪 Déconnexion</a>
            </div>
        </div>
    </div>
</body>
</html>