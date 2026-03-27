<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';

// Vérifier si une section est sélectionnée
if(!isset($_GET['section_id']) || !isset($_GET['chapter_id'])){
    header("Location: details_chapitre.php?chapter_id=" . ($_GET['chapter_id'] ?? ''));
    exit();
}

$section_id = $_GET['section_id'];
$chapter_id = $_GET['chapter_id'];

// Récupérer les infos de la section
$sql_section = "SELECT * FROM Section WHERE section_id = ?";
$stmt = $conn->prepare($sql_section);
$stmt->bind_param("i", $section_id);
$stmt->execute();
$section = $stmt->get_result()->fetch_assoc();

if(!$section){
    header("Location: details_chapitre.php?chapter_id=" . $chapter_id);
    exit();
}

// Récupérer les infos du chapitre
$sql_chapter = "SELECT * FROM Chapters WHERE chapter_id = ?";
$stmt = $conn->prepare($sql_chapter);
$stmt->bind_param("i", $chapter_id);
$stmt->execute();
$chapter = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la section - Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../asset/css/dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>
<body style="background: #f3f4f6;">
    <div class="wrapper">
        <?php include '../layout/sidebar.php'; ?>

        <div id="content">
            <?php include '../layout/appbar.php'; ?>

            <div style="padding: 1.2rem;">
                <div class="row">
                    <div class="col-12">
                        
                        <nav style="margin-bottom: 1rem;">
                            <ol style="display: flex; flex-wrap: wrap; list-style: none; padding: 0; margin: 0; gap: 8px;">
                                <li><a href="../layout/dashboard.php" style="color: #6c757d; text-decoration: none; font-size: 0.85rem;"><i class="bi bi-house-door me-1"></i> Accueil</a> <span style="color: #adb5bd;">/</span></li>
                                <li><a href="../cours/ajouter_chapitre.php" style="color: #6c757d; text-decoration: none; font-size: 0.85rem;"> Chapitres</a> <span style="color: #adb5bd;">/</span></li>
                                <li><a href="details_chapitre.php?chapter_id=<?php echo $chapter_id; ?>" style="color: #6c757d; text-decoration: none; font-size: 0.85rem;"> Détails chapitre</a> <span style="color: #adb5bd;">/</span></li>
                                <li><span style="color: #6366f1; font-size: 0.85rem; font-weight: 500;"> Détails section</span></li>
                            </ol>
                        </nav>
                        
                        <div style="background: white; border-radius: 24px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                            
                            <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #eef2ff;">
                                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                                    <div>
                                        <span style="display: inline-flex; align-items: center; gap: 8px; background: #eef2ff; padding: 4px 12px; border-radius: 40px;">
                                            <i class="fas fa-layer-group" style="color: #6366f1; font-size: 0.7rem;"></i>
                                            <span style="color: #4b5563; font-size: 0.65rem; font-weight: 500;">SECTION DÉTAILLÉE</span>
                                        </span>
                                        <h1 style="color: #0f172a; font-size: 1.4rem; font-weight: 700; margin-top: 1rem; margin-bottom: 0;">
                                            <span style="color: #64748b; font-size: 0.85rem; font-weight: 500;">Titre :</span>
                                            <?php echo htmlspecialchars($section['title']); ?>
                                        </h1>
                                    </div>
                                    <div>
                                        <?php if($section['is_active'] == 1): ?>
                                            <span style="display: inline-flex; align-items: center; gap: 6px; padding: 5px 14px; border-radius: 40px; background: #10b981; color: white; font-size: 0.7rem; font-weight: 600;">
                                                <i class="fas fa-circle" style="font-size: 6px;"></i> ACTIF
                                            </span>
                                        <?php else: ?>
                                            <span style="display: inline-flex; align-items: center; gap: 6px; padding: 5px 14px; border-radius: 40px; background: #ef4444; color: white; font-size: 0.7rem; font-weight: 600;">
                                                <i class="fas fa-circle" style="font-size: 6px;"></i> INACTIF
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div style="padding: 1.5rem;">
                                
                                <div style="background: #f8fafc; border-radius: 20px; padding: 1rem; border: 1px solid #eef2ff; margin-bottom: 1.5rem;">
                                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                                        <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #6366f1, #8b5cf6); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-book" style="color: white; font-size: 0.9rem;"></i>
                                        </div>
                                        <span style="font-size: 0.65rem; font-weight: 600; color: #64748b;">CHAPITRE ASSOCIÉ</span>
                                    </div>
                                    <p style="font-size: 1rem; font-weight: 500; color: #0f172a; margin: 0 0 0 48px;">
                                        <?php echo htmlspecialchars($chapter['title']); ?>
                                    </p>
                                </div>
                                
                                <div style="background: #fefce8; border-radius: 20px; padding: 1.2rem; border: 1px solid #fde047;">
                                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;">
                                        <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #eab308, #ca8a04); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-quote-right" style="color: white; font-size: 0.9rem;"></i>
                                        </div>
                                        <div>
                                            <h3 style="font-weight: 600; color: #854d0e; margin: 0; font-size: 0.9rem;">Description complète</h3>
                                        </div>
                                    </div>
                                    <div style="color: #1e293b; line-height: 1.65; font-size: 0.85rem;">
                                        <?php 
                                        $description_brute = strip_tags($section['description']); 
                                        echo nl2br(htmlspecialchars($description_brute)); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        function handleResize() {
            if (window.innerWidth <= 768) {
                document.getElementById('sidebar').classList.add('active');
            } else {
                document.getElementById('sidebar').classList.remove('active');
            }
        }
        window.addEventListener('resize', handleResize);
        handleResize();
    </script>
</body>
</html>