<?php
session_start();
require_once '../config/db.php';

// Récupérer les paramètres
$lessons_id = isset($_GET['lessons_id']) ? (int)$_GET['lessons_id'] : 0;
$section_id = isset($_GET['section_id']) ? (int)$_GET['section_id'] : 0;

if($lessons_id == 0) {
    header("Location: cours.php");
    exit();
}

// Récupérer la leçon
$sql_lesson = "SELECT l.*, c.name as niveau_name, s.name as matiere_name 
               FROM Lessons l
               JOIN Classroom c ON l.classroom_id = c.classroom_id
               JOIN Subject s ON l.subject_id = s.subject_id
               WHERE l.lessons_id = $lessons_id AND l.is_active = 1";
$result_lesson = $conn->query($sql_lesson);
$lesson = $result_lesson->fetch_assoc();

if(!$lesson) {
    header("Location: cours.php");
    exit();
}

// Récupérer tous les chapitres de cette leçon
$sql_chapitres = "SELECT * FROM Chapters WHERE lessons_id = $lessons_id AND is_active = 1 ORDER BY chapter_id";
$chapitres = $conn->query($sql_chapitres);

// Récupérer la section actuelle
$current_section = null;
if($section_id > 0) {
    $sql_section = "SELECT * FROM Section WHERE section_id = $section_id";
    $result_section = $conn->query($sql_section);
    $current_section = $result_section->fetch_assoc();
}

// Si pas de section, prendre la première section du premier chapitre
if(!$current_section && $chapitres->num_rows > 0) {
    $first_chapitre = $chapitres->fetch_assoc();
    $sql_first_section = "SELECT * FROM Section WHERE chapter_id = " . $first_chapitre['chapter_id'] . " AND is_active = 1 ORDER BY section_id LIMIT 1";
    $result_first = $conn->query($sql_first_section);
    $current_section = $result_first->fetch_assoc();
    $section_id = $current_section ? $current_section['section_id'] : 0;
    
    // Remettre le pointeur des chapitres à zéro
    $chapitres->data_seek(0);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/cours-francais.css">
    <title><?php echo htmlspecialchars($lesson['title']); ?></title>
    <style>
        /* Styles supplémentaires pour le contenu dynamique */
        .lesson-content .written-content {
            display: block;
        }
        .main-content.content-active .video-content {
            display: block;
        }
        .main-content.content-active .written-content {
            display: none;
        }
        .main-content.written-active .video-content {
            display: none;
        }
        .main-content.written-active .written-content {
            display: block;
        }
        .video-placeholder {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            color: white;
            text-align: center;
        }
        .content-section {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            border: 1px solid #e9ecef;
        }
        .content-section h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }
        .content-section .example {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 12px;
            margin: 1rem 0;
            border-left: 4px solid #2ecc71;
        }
        .content-section .grammar-point {
            margin-bottom: 1rem;
        }
        .content-section .grammar-point h4 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        .table-container {
            overflow-x: auto;
        }
        .conjugation-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }
        .conjugation-table th,
        .conjugation-table td {
            border: 1px solid #e9ecef;
            padding: 0.8rem;
            text-align: left;
        }
        .conjugation-table th {
            background: #f1f5f9;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="course-container">
        <!-- Sidebar avec chapitres -->
        <div class="sidebar">
            <div class="course-title">
                <h1><?php echo htmlspecialchars($lesson['title']); ?></h1>
                <div class="mobile-close-btn">×</div>
            </div>
            
            <div class="chapters">
                <?php while($chapitre = $chapitres->fetch_assoc()): 
                    // Récupérer les sections de ce chapitre
                    $sql_sections = "SELECT * FROM Section WHERE chapter_id = " . $chapitre['chapter_id'] . " AND is_active = 1 ORDER BY section_id";
                    $sections = $conn->query($sql_sections);
                ?>
                    <div class="chapter">
                        <div class="chapter-title"><?php echo htmlspecialchars($chapitre['title']); ?></div>
                        <ul class="lessons">
                            <?php while($section = $sections->fetch_assoc()): ?>
                                <li class="lesson <?php echo ($section_id == $section['section_id']) ? 'active' : ''; ?>" 
                                    data-section-id="<?php echo $section['section_id']; ?>">
                                    <?php echo htmlspecialchars($section['title']); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-content content-active">
            
            <?php if($current_section): ?>
            <div class="lesson-content active" id="section-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2><?php echo htmlspecialchars($current_section['title']); ?></h2>
                        <button class="mobile-toggle-btn">☰ Menu</button>
                    </div>
                </div>

                <div class="lesson-type">
                    <button class="type-btn active" data-type="video">Vidéo du cours</button>
                    <button class="type-btn" data-type="written">Cours écrit</button>
                </div>

                <!-- CONTENU VIDÉO -->
                <div class="video-content">
                    <div class="video-placeholder">
                       <h1>📺 VIDÉO - <?php echo strtoupper(htmlspecialchars($current_section['title'])); ?></h1>
                       <p style="margin-top: 1rem;">La vidéo sera bientôt disponible</p>
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <?php echo $current_section['description']; ?>
                    
                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete(<?php echo $current_section['section_id']; ?>)">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <div style="text-align: center; padding: 3rem;">
                    <h2>Aucune section disponible</h2>
                    <p>Ce cours n'a pas encore de contenu.</p>
                    <button class="nav-btn prev" onclick="window.location.href='cours.php'">← Retour aux cours</button>
                </div>
            <?php endif; ?>
            
        </div>
    </div>

    <script>
        // Navigation entre les leçons (sections)
        const lessons = document.querySelectorAll('.lesson');
        const typeButtons = document.querySelectorAll('.type-btn');
        const mainContent = document.querySelector('.main-content');
        const mobileCloseBtn = document.querySelector('.mobile-close-btn');
        const sidebar = document.querySelector('.sidebar');
        const mobileToggleBtns = document.querySelectorAll('.mobile-toggle-btn');

        // Gestion des leçons actives
        lessons.forEach(lesson => {
            lesson.addEventListener('click', function() {
                const sectionId = this.getAttribute('data-section-id');
                window.location.href = `lire-cours.php?lessons_id=<?php echo $lessons_id; ?>&section_id=${sectionId}`;
            });
        });

        // Gestion des types de contenu (vidéo/écrit)
        typeButtons.forEach(button => {
            button.addEventListener('click', function() {
                typeButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                const contentType = this.getAttribute('data-type');
                if (contentType === 'video') {
                    mainContent.classList.remove('written-active');
                    mainContent.classList.add('content-active');
                } else {
                    mainContent.classList.remove('content-active');
                    mainContent.classList.add('written-active');
                }
            });
        });

        // Gestion du menu mobile
        if (mobileCloseBtn) {
            mobileCloseBtn.addEventListener('click', function() {
                sidebar.classList.remove('active');
            });
        }

        mobileToggleBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                sidebar.classList.add('active');
            });
        });

        // Fermer la sidebar en cliquant à l'extérieur sur mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768 && 
                sidebar.classList.contains('active') &&
                !sidebar.contains(event.target) &&
                !event.target.classList.contains('mobile-toggle-btn')) {
                sidebar.classList.remove('active');
            }
        });

        // Au chargement, ajuster l'affichage sur mobile
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth <= 768) {
                mainContent.classList.remove('content-active');
                mainContent.classList.add('written-active');
                typeButtons.forEach(btn => {
                    btn.classList.remove('active');
                    if (btn.getAttribute('data-type') === 'written') {
                        btn.classList.add('active');
                    }
                });
            }
        });

        // Fonction pour marquer une section comme terminée
        function markAsComplete(sectionId) {
            fetch('mark_complete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `section_id=${sectionId}`
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    const lessonElement = document.querySelector(`.lesson[data-section-id="${sectionId}"]`);
                    if (lessonElement) {
                        lessonElement.style.backgroundColor = '#2ecc71';
                        lessonElement.style.color = 'white';
                        lessonElement.innerHTML += ' ✓';
                    }
                    alert('Section marquée comme terminée !');
                } else {
                    alert('Erreur serveur: ' + data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Erreur de connexion: ' + error);
            });
        }
    </script>
</body>
</html>