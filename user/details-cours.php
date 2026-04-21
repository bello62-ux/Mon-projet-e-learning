<?php
// Définir le titre de la page
$page_title = "Détails du cours - Nournours";

// Inclure le header
require_once '../layout/header.php';

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);

// Connexion à la BDD
require_once '../config/db.php';

// Récupérer l'ID depuis l'URL
$lessons_id = isset($_GET['lessons_id']) ? (int)$_GET['lessons_id'] : 0;

// Si pas d'ID, rediriger
if ($lessons_id == 0) {
    header('Location: cours.php');
    exit();
}

// Récupérer la leçon depuis la BDD
$sql_lesson = "SELECT l.*, c.name as niveau_name, s.name as matiere_name 
               FROM Lessons l
               JOIN Classroom c ON l.classroom_id = c.classroom_id
               JOIN Subject s ON l.subject_id = s.subject_id
               WHERE l.lessons_id = $lessons_id AND l.is_active = 1";
$result_lesson = $conn->query($sql_lesson);

if ($result_lesson->num_rows == 0) {
    header('Location: cours.php');
    exit();
}

$lesson_bdd = $result_lesson->fetch_assoc();

// Récupérer les chapitres avec numérotation
$sql_chapitres = "SELECT * FROM Chapters 
                  WHERE lessons_id = $lessons_id 
                  AND is_active = 1 
                  ORDER BY chapter_id";
$result_chapitres = $conn->query($sql_chapitres);
$programme_bdd = [];
$chapitre_numero = 1;
while ($chapitre = $result_chapitres->fetch_assoc()) {
    $programme_bdd[] = 'Chapitre ' . $chapitre_numero . ' : ' . $chapitre['title'];
    $chapitre_numero++;
}

// Récupérer l'image depuis Media
$image_path = '../media/images/default-course.jpg';
$sql_image = "SELECT media_path FROM Media 
              WHERE media_type = 'image' 
              AND (lessons_id = $lessons_id 
                   OR chapter_id IN (SELECT chapter_id FROM Chapters WHERE lessons_id = $lessons_id))
              LIMIT 1";
$result_image = $conn->query($sql_image);
if ($result_image && $result_image->num_rows > 0) {
    $image_row = $result_image->fetch_assoc();
    if (!empty($image_row['media_path'])) {
        $media_path = $image_row['media_path'];
        if (strpos($media_path, 'uploads/') === 0) {
            $image_path = '../' . $media_path;
        } elseif (strpos($media_path, '../') !== 0 && strpos($media_path, 'media/') !== 0) {
            $image_path = '../' . $media_path;
        } else {
            $image_path = $media_path;
        }
    }
}

// Récupérer la première section
$first_section_id = 0;
$sql_first_section = "SELECT s.section_id 
                      FROM Section s
                      JOIN Chapters c ON s.chapter_id = c.chapter_id
                      WHERE c.lessons_id = $lessons_id AND s.is_active = 1 
                      ORDER BY s.section_id LIMIT 1";
$result_first = $conn->query($sql_first_section);
if ($result_first && $result_first->num_rows > 0) {
    $first_section = $result_first->fetch_assoc();
    $first_section_id = $first_section['section_id'];
}

// Construction du tableau cours
$cours = [
    'titre' => $lesson_bdd['title'],
    'description' => $lesson_bdd['description'],
    'niveau' => $lesson_bdd['niveau_name'],
    'matiere' => $lesson_bdd['matiere_name'],
    'duree' => $lesson_bdd['time'] ? $lesson_bdd['time'] . ' minutes' : 'Durée variable',
    'chapitres' => count($programme_bdd),
    'video' => false,
    'image' => $image_path,
    'url' => '#',
    'lessons_id' => $lessons_id,
    'programme' => $programme_bdd
];
?>

<link rel="stylesheet" href="../asset/css/details-cours.css">

<div class="course-detail-container">
    <div class="course-detail-header">
        <span class="course-badge"><?php echo $cours['niveau']; ?> • <?php echo $cours['matiere']; ?></span>
        <h1><?php echo $cours['titre']; ?></h1>
        <div class="course-meta">
            <div class="meta-item">
                <i class="fas fa-clock"></i> <?php echo $cours['duree']; ?>
            </div>
            <div class="meta-item">
                <i class="fas fa-book"></i> <?php echo $cours['chapitres']; ?> chapitres
            </div>
            <div class="meta-item">
                <i class="fas <?php echo $cours['video'] ? 'fa-video' : 'fa-file-alt'; ?>"></i>
                <?php echo $cours['video'] ? 'Cours vidéo inclus' : 'Cours écrit'; ?>
            </div>
        </div>
        
    </div>
    
    <div class="course-detail-grid">
        <div class="course-info-card">
            <h3>🎯 Objectifs pédagogiques</h3>
            <p style="margin-top: 20px; font-size: 1.1rem;"><?php echo $cours['description']; ?></p>
        </div>
        
        <div class="course-sidebar">
            <img src="<?php echo $cours['image']; ?>" alt="<?php echo $cours['titre']; ?>" class="course-image">
            
            <?php if ($is_logged_in): ?>
                <?php if ($cours['lessons_id'] > 0 && $first_section_id > 0): ?>
                    <a href="lire-cours.php?lessons_id=<?php echo $cours['lessons_id']; ?>&section_id=<?php echo $first_section_id; ?>" class="btn-start">▶ Commencer le cours</a>
                <?php else: ?>
                    <a href="#" class="btn-start">▶ Commencer le cours</a>
                <?php endif; ?>
            <?php else: ?>
                <div class="login-required">
                    <div class="login-message">
                        <i class="fas fa-lock"></i>
                        <p>Vous devez être connecté pour accéder à ce cours</p>
                        <a href="../AUTHENTIFICATION/login.php" class="btn-login-required">Se connecter</a>
                        <a href="../AUTHENTIFICATION/register.php" class="btn-register-required">S'inscrire gratuitement</a>
                    </div>
                </div>
            <?php endif; ?>
            
            <a href="cours.php" class="btn-start btn-back">← Retour à la liste des cours</a>
        </div>
    </div>
    
    <div class="course-info-card" style="margin-top: 40px;">
        <h3>📚 Programme du cours</h3>
        <ul class="programme-list">
            <?php foreach ($cours['programme'] as $chapitre): ?>
                <li><?php echo $chapitre; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<style>
    .login-required {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        margin-bottom: 15px;
        border: 1px solid #e9ecef;
    }
    
    .login-message i {
        font-size: 2rem;
        color: #e74c3c;
        margin-bottom: 10px;
        display: block;
    }
    
    .login-message p {
        color: #666;
        margin-bottom: 15px;
        font-size: 0.9rem;
    }
    
    .btn-login-required, .btn-register-required {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        margin: 5px;
        transition: all 0.3s ease;
    }
    
    .btn-login-required {
        background: #2ecc71;
        color: white;
    }
    
    .btn-login-required:hover {
        background: #27ae60;
        transform: translateY(-2px);
    }
    
    .btn-register-required {
        background: transparent;
        color: #2ecc71;
        border: 2px solid #2ecc71;
    }
    
    .btn-register-required:hover {
        background: #2ecc71;
        color: white;
        transform: translateY(-2px);
    }
</style>

<?php require_once '../layout/footer.php'; ?>