<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';

// Vérifier si une leçon est sélectionnée
if(!isset($_GET['lessons_id'])){
    header("Location: ../cours/ajouter_lecon.php");
    exit();
}

$lessons_id = $_GET['lessons_id'];

// Récupérer les infos de la leçon
$sql = "SELECT l.*, c.name as class_name, s.name as subject_name, m.media_path
        FROM Lessons l
        LEFT JOIN Classroom c ON l.classroom_id = c.classroom_id
        LEFT JOIN Subject s ON l.subject_id = s.subject_id
        LEFT JOIN Media m ON l.lessons_id = m.lecon_id
        WHERE l.lessons_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $lessons_id);
$stmt->execute();
$lesson = $stmt->get_result()->fetch_assoc();

if(!$lesson){
    header("Location: ../cours/ajouter_lecon.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($lesson['title']); ?> - Détails du cours</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../asset/css/dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>
<body style="background: #f3f4f6; font-family: system-ui, -apple-system, sans-serif;">
    <div class="wrapper">
        <?php include '../layout/sidebar.php'; ?>

        <div id="content">
            <?php include '../layout/appbar.php'; ?>

            <div style="padding: 1rem;">
                <div class="row">
                    <div class="col-12">
                        
                        
                        <div style="margin-bottom: 1rem;">
                            <nav>
                                <ol style="display: flex; flex-wrap: wrap; list-style: none; padding: 0; margin: 0; gap: 6px;">
                                    <li><a href="../layout/dashboard.php" style="color: #6c757d; text-decoration: none; font-size: 1rem;">Accueil</a> <span style="color: #cbd5e1;">/</span></li>
                                    <li><a href="../cours/ajouter_lecon.php" style="color: #6c757d; text-decoration: none; font-size: 1rem;">Cours</a> <span style="color: #cbd5e1;">/</span></li>
                                    <li><span style="color: #6366f1; font-size: 1rem;">Détails</span></li>
                                </ol>
                            </nav>
                        </div>
                        
                       
                        <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                            
                            <!-- En-tête simple -->
                            <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #eef2ff;">
                                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.5rem;">
                                    <div>
                                        <span style="display: inline-flex; align-items: center; gap: 6px; background: #eef2ff; padding: 4px 12px; border-radius: 40px;">
                                            <span style="color: #4b5563; font-size: 0.8rem; font-weight: 500;">COURS</span>
                                        </span>
                                    </div>
                                    <div>
                                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 40px; background: <?php echo $lesson['is_active'] == 1 ? '#10b981' : '#ef4444'; ?>;">
                                            <i class="fas fa-circle" style="font-size: 5px; color: white;"></i>
                                            <span style="font-size: 0.6rem; font-weight: 600; color: white;">
                                                <?php echo $lesson['is_active'] == 1 ? 'ACTIF' : 'BROUILLON'; ?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div style="padding: 1.2rem;">
                                <div class="row g-3">
                                    
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 20px; padding: 0.8rem; text-align: center;">
                                            <?php if(!empty($lesson['media_path'])): ?>
                                                <img src="../../<?php echo $lesson['media_path']; ?>" 
                                                     alt="<?php echo htmlspecialchars($lesson['title']); ?>" 
                                                     style="width: 100%; max-height: 180px; object-fit: contain; border-radius: 16px;">
                                            <?php else: ?>
                                                <div style="padding: 2rem;">
                                                    <i class="fas fa-image" style="font-size: 48px; color: #cbd5e1;"></i>
                                                    <p style="color: #94a3b8; margin-top: 0.5rem; font-size: 0.7rem;">Aucune image</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-8">
                                        <h1 style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin-bottom: 0.8rem;">
                                            <?php echo htmlspecialchars($lesson['title']); ?>
                                        </h1>
                                        
                                        <!--  -->
                                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.6rem; margin-bottom: 1rem;">
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-building" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">CLASSE</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.8rem;"><?php echo $lesson['class_name'] ?? '—'; ?></span>
                                            </div>
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-book" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">MATIÈRE</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.8rem;"><?php echo $lesson['subject_name'] ?? '—'; ?></span>
                                            </div>
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-hourglass-half" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">DURÉE</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.8rem;"><?php echo $lesson['time'] ? $lesson['time'] . ' min' : '—'; ?></span>
                                            </div>
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-calendar" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">CRÉATION</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.75rem;"><?php echo date('d M Y', strtotime($lesson['date_creation'])); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div style="margin-top: 1rem;">
                                    <div style="background: #fefce8; border-radius: 18px; padding: 1rem; border: 1px solid #fde047;">
                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 0.8rem;">
                                            <h3 style="font-weight: 600; color: #854d0e; margin: 0; font-size: 0.85rem;">Description</h3>
                                        </div>
                                        <div style="color: #334155; line-height: 1.5; font-size: 0.8rem;">
                                            <?php echo $lesson['description']; ?>
                                        </div>
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