<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';

// Vérifier si l'ID est passé dans l'URL
if(!isset($_GET['chapter_id'])){
    header("Location: ajouter_chapitre.php");
    exit();
}

$chapter_id = $_GET['chapter_id'];

// Récupérer les infos du chapitre
$sql = "SELECT c.*, m.media_path, l.title as lesson_title
        FROM Chapters c
        LEFT JOIN Media m ON c.chapter_id = m.chapitre_id
        LEFT JOIN Lessons l ON c.lessons_id = l.lessons_id
        WHERE c.chapter_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $chapter_id);
$stmt->execute();
$chapter = $stmt->get_result()->fetch_assoc();

if(!$chapter){
    header("Location: ajouter_chapitre.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un chapitre - Admin</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="../../asset/css/dashboard.css">
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
                                <li><a href="../layout/dashboard.php" style="color: #6c757d; text-decoration: none; font-size: 1rem; font-weight: 500;"> Accueil</a> <span style="color: #adb5bd;">/</span></li>
                                <li><a href="ajouter_chapitre.php" style="color: #6c757d; text-decoration: none; font-size: 1rem; font-weight: 500;"> Chapitres</a> <span style="color: #adb5bd;">/</span></li>
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;"> Modifier un chapitre</span></li>
                            </ol>
                        </nav>
                        
                        
                        <div style="margin-bottom: 1.2rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Modifier un chapitre</h2>
                        </div>

                        
                        <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div style="padding: 1.5rem;">
                                <form action="../../traitement/traitement_modification_chapitre.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="chapter_id" value="<?php echo $chapter['chapter_id']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Titre du chapitre</label>
                                                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($chapter['title']); ?>" required style="border-radius: 10px;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Leçon</label>
                                                <select class="form-select" name="lessons_id" style="border-radius: 10px;">
                                                    <option value="">Aucune leçon</option>
                                                    <?php
                                                    $sql_lessons = "SELECT * FROM Lessons ORDER BY title";
                                                    $result_lessons = $conn->query($sql_lessons);
                                                    while($lesson = $result_lessons->fetch_assoc()) {
                                                        $selected = ($lesson["lessons_id"] == $chapter['lessons_id']) ? 'selected' : '';
                                                        echo '<option value="' . $lesson["lessons_id"] . '" ' . $selected . '>' . htmlspecialchars($lesson["title"]) . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Statut</label>
                                        <select class="form-select" name="is_active" style="border-radius: 10px;">
                                            <option value="1" <?php echo $chapter['is_active'] == 1 ? 'selected' : ''; ?>>Actif</option>
                                            <option value="0" <?php echo $chapter['is_active'] == 0 ? 'selected' : ''; ?>>Inactif</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Image</label>
                                        <input type="file" class="form-control" name="media" accept="image/*" style="border-radius: 10px;">
                                        <small style="color: #94a3b8;">Laissez vide pour garder l'image actuelle</small>
                                        <?php if(!empty($chapter['media_path'])): ?>
                                            <div class="mt-2">
                                                <img src="../../<?php echo $chapter['media_path']; ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                                <span class="text-muted ms-2">Image actuelle</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- DESCRIPTION EN BAS -->
                                    <div class="mb-4">
                                        <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Description</label>
                                        <textarea class="form-control summernote" name="description" rows="3" required style="border-radius: 10px;"><?php echo htmlspecialchars($chapter['description']); ?></textarea>
                                    </div>
                                    
                                    <!-- BOUTONS EN BAS -->
                                    <div style="display: flex; justify-content: flex-end; gap: 12px;">
                                        <a href="ajouter_chapitre.php" class="btn btn-secondary px-4" style="border-radius: 40px; text-decoration: none;">Annuler</a>
                                        <button type="submit" class="btn btn-primary px-4" name="modifier" style="border-radius: 40px;">Modifier</button>
                                    </div>
                                </form>
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
        $(document).ready(function() {
            $('.summernote').summernote({ 
                height: 180, 
                toolbar: [['style', ['bold', 'italic', 'underline']], ['para', ['ul', 'ol']], ['view', ['codeview']]] 
            });
        });

        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        function handleResize() {
            if (window.innerWidth <= 768) document.getElementById('sidebar').classList.add('active');
            else document.getElementById('sidebar').classList.remove('active');
        }
        window.addEventListener('resize', handleResize);
        handleResize();
    </script>
</body>
</html>