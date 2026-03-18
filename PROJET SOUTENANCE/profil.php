<?php
// profil.php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Récupérer les informations de l'utilisateur
include('db.php');
$user_id = $_SESSION['user_id'];
$sql = "SELECT nom, email, niveau_scolaire, DATE_FORMAT(date_inscription, '%d/%m/%Y') as date_inscription FROM utilisateurs WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$utilisateur = $result->fetch_assoc();

$stmt->close();

// Récupérer les cours terminés
$sql_progress = "SELECT c.nom, c.matiere, pc.date_completion 
                 FROM progress_cours pc 
                 JOIN cours c ON pc.cours_id = c.id 
                 WHERE pc.user_id = ? AND pc.termine = TRUE 
                 ORDER BY pc.date_completion DESC";
$stmt_progress = $conn->prepare($sql_progress);
$stmt_progress->bind_param("i", $user_id);
$stmt_progress->execute();
$result_progress = $stmt_progress->get_result();
$cours_termines = $result_progress->fetch_all(MYSQLI_ASSOC);

// Compter les cours terminés
$nb_cours_termines = count($cours_termines);

// === NOUVEAU : COMPTER LE TOTAL DES COURS DU NIVEAU DE L'UTILISATEUR ===
$sql_total_niveau = "SELECT COUNT(*) as total FROM cours WHERE niveau = ?";
$stmt_total = $conn->prepare($sql_total_niveau);
$stmt_total->bind_param("s", $utilisateur['niveau_scolaire']);
$stmt_total->execute();
$result_total = $stmt_total->get_result();
$row_total = $result_total->fetch_assoc();
$total_cours_niveau = $row_total['total'];

// Calculer le pourcentage de progression
if ($total_cours_niveau > 0) {
    $pourcentage = round(($nb_cours_termines / $total_cours_niveau) * 100);
    // Limiter à 100% maximum
    $pourcentage = min($pourcentage, 100);
} else {
    $pourcentage = 0;
}

$stmt_progress->close();
$stmt_total->close();
$conn->close();

// Déterminer l'icône et la couleur selon le niveau scolaire
$niveau_icons = [
    'cm2' => '🎒',
    '3eme' => '📚', 
    'terminale' => '🎓'
];

$niveau_colors = [
    'cm2' => '#e74c3c',
    '3eme' => '#3498db',
    'terminale' => '#2ecc71'
];

$icon = $niveau_icons[$utilisateur['niveau_scolaire']] ?? '👤';
$color = $niveau_colors[$utilisateur['niveau_scolaire']] ?? '#34495e';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - <?php echo htmlspecialchars($utilisateur['nom']); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
        }
        
        .profile-container {
            flex: 1;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        
        .profile-header {
            background: <?php echo $color; ?>;
            color: white;
            padding: 40px 40px 30px 40px;
            text-align: center;
            position: relative;
            flex-shrink: 0;
            width: 100%;
        }
        
        .avatar {
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            margin: 0 auto 20px;
            border: 4px solid white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
        
        .welcome-message {
            font-size: 24px;
            font-weight: 300;
            margin-bottom: 15px;
            opacity: 0.9;
        }
        
        .user-name {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .user-level {
            font-size: 18px;
            opacity: 0.9;
            background: rgba(255,255,255,0.2);
            padding: 10px 25px;
            border-radius: 25px;
            display: inline-block;
            backdrop-filter: blur(10px);
        }
        
        .profile-content {
            padding: 40px 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
            width: 100%;
        }
        
        .info-card {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 15px;
            border-left: 5px solid <?php echo $color; ?>;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .info-label {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 12px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .info-value {
            font-size: 20px;
            color: #2c3e50;
            font-weight: 600;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin: 40px 0;
            width: 100%;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 2px solid #f1f3f4;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
            border-color: <?php echo $color; ?>;
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: <?php echo $color; ?>;
            margin-bottom: 8px;
        }
        
        .stat-label {
            font-size: 16px;
            color: #6c757d;
            font-weight: 500;
        }
        
        /* Barre de progression */
        .progress-bar-container {
            margin-top: 10px;
            height: 8px;
            background: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            background: <?php echo $color; ?>;
            width: <?php echo $pourcentage; ?>%;
            transition: width 1s ease-in-out;
            border-radius: 4px;
        }
        
        .chapitres-section {
            margin: 40px 0;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 15px;
            border-left: 5px solid <?php echo $color; ?>;
            width: 100%;
        }
        
        .chapitres-section h3 {
            font-size: 22px;
            color: #2c3e50;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .chapitres-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }
        
        .chapitre-item {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border-left: 3px solid <?php echo $color; ?>;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        
        .actions {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: auto;
            padding-top: 40px;
            flex-wrap: wrap;
            width: 100%;
        }
        
        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }
        
        .btn-primary {
            background: <?php echo $color; ?>;
            color: white;
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .btn-logout {
            background: #e74c3c;
            color: white;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
        
        /* Animation pour les éléments qui apparaissent */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .profile-header, .info-card, .stat-card, .chapitres-section {
            animation: fadeInUp 0.8s ease-out;
        }
        
        .info-card:nth-child(2) { animation-delay: 0.1s; }
        .info-card:nth-child(3) { animation-delay: 0.2s; }
        .stat-card:nth-child(2) { animation-delay: 0.3s; }
        .stat-card:nth-child(3) { animation-delay: 0.4s; }
        .stat-card:nth-child(4) { animation-delay: 0.5s; }
        
        @media (max-width: 768px) {
            .profile-header {
                padding: 30px 20px 20px 20px;
            }
            
            .profile-content {
                padding: 30px 20px;
            }
            
            .avatar {
                width: 100px;
                height: 100px;
                font-size: 40px;
            }
            
            .welcome-message {
                font-size: 20px;
            }
            
            .user-name {
                font-size: 28px;
            }
            
            .user-level {
                font-size: 16px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
            
            .actions {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
                padding: 16px;
            }
        }
        
        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .stat-number {
                font-size: 32px;
            }
            
            .info-value {
                font-size: 18px;
            }
            
            .welcome-message {
                font-size: 18px;
            }
            
            .user-name {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="avatar">
                <?php echo $icon; ?>
            </div>
            <div class="welcome-message">Bienvenue sur ton profil</div>
            <div class="user-name"><?php echo htmlspecialchars($utilisateur['nom']); ?></div>
            <div class="user-level">
                Niveau : <?php echo strtoupper($utilisateur['niveau_scolaire']); ?>
            </div>
        </div>
        
        <div class="profile-content">
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-label">📧 Email</div>
                    <div class="info-value"><?php echo htmlspecialchars($utilisateur['email']); ?></div>
                </div>
                
                <div class="info-card">
                    <div class="info-label">🎓 Niveau Scolaire</div>
                    <div class="info-value"><?php echo strtoupper($utilisateur['niveau_scolaire']); ?></div>
                </div>
                
                <div class="info-card">
                    <div class="info-label">📅 Date d'inscription</div>
                    <div class="info-value"><?php echo $utilisateur['date_inscription'] ?? 'Non disponible'; ?></div>
                </div>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $nb_cours_termines; ?></div>
                    <div class="stat-label">Cours terminés</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $total_cours_niveau; ?></div>
                    <div class="stat-label">Cours disponibles</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $pourcentage; ?>%</div>
                    <div class="stat-label">Progression</div>
                    <div class="progress-bar-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
            </div>
            
            <div class="chapitres-section">
                <h3>📖 Mes Cours Complétés</h3>
                <div class="chapitres-list" id="completed-chapitres">
                    <?php if (count($cours_termines) > 0): ?>
                        <?php foreach ($cours_termines as $cours): ?>
                            <div class="chapitre-item">
                                <strong><?php echo htmlspecialchars($cours['nom']); ?></strong><br>
                                <small><?php echo htmlspecialchars($cours['matiere']); ?></small><br>
                                <em>Terminé le : <?php echo date('d/m/Y', strtotime($cours['date_completion'])); ?></em>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="chapitre-item">Aucun cours complété pour le moment</div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="actions">
                <a href="cours.html" class="btn btn-primary">📚 Accéder aux cours</a>
                <a href="logout.php" class="btn btn-logout">🚪 Déconnexion</a>
            </div>
        </div>
    </div>

    <script>
        // Animation pour les éléments qui apparaissent
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.info-card, .stat-card, .chapitres-section');
            elements.forEach((element, index) => {
                element.style.animationDelay = (index * 0.1) + 's';
            });
        });
    </script>
</body>
</html>