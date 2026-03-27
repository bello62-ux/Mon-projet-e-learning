<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un cours - Admin</title>
    
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
                                <li><a href="ajouter_lecon.php" style="color: #6c757d; text-decoration: none; font-size: 1rem; font-weight: 500;"> Cours</a> <span style="color: #adb5bd;">/</span></li>
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;"> Ajouter un cours</span></li>
                            </ol>
                        </nav>
                        
                        
                        <div style="margin-bottom: 1.2rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Ajouter un cours</h2>
                        </div>

                        <!-- Formulaire d'ajout -->
                        <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div style="padding: 1.5rem;">
                                <form action="../../traitement/traitement_lecon.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Titre du cours</label>
                                                <input type="text" class="form-control" name="title" required style="border-radius: 10px;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Durée (minutes)</label>
                                                <input type="number" class="form-control" name="time" min="1" placeholder="30" style="border-radius: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Classe</label>
                                                <select class="form-select" name="classroom_id" style="border-radius: 10px;">
                                                    <option value="">Sélectionner</option>
                                                    <?php
                                                    $sql_classes = "SELECT * FROM Classroom ORDER BY name";
                                                    $result_classes = $conn->query($sql_classes);
                                                    while($class = $result_classes->fetch_assoc()) {
                                                        echo '<option value="' . $class["classroom_id"] . '">' . htmlspecialchars($class["name"]) . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Matière</label>
                                                <select class="form-select" name="subject_id" style="border-radius: 10px;">
                                                    <option value="">Sélectionner</option>
                                                    <?php
                                                    $sql_subjects = "SELECT * FROM Subject ORDER BY name";
                                                    $result_subjects = $conn->query($sql_subjects);
                                                    while($subject = $result_subjects->fetch_assoc()) {
                                                        echo '<option value="' . $subject["subject_id"] . '">' . htmlspecialchars($subject["name"]) . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Statut</label>
                                        <select class="form-select" name="is_active" style="border-radius: 10px;">
                                            <option value="1">Actif</option>
                                            <option value="0">Inactif</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Image</label>
                                        <input type="file" class="form-control" name="media" accept="image/*" style="border-radius: 10px;">
                                        <small style="color: #94a3b8;">JPG, PNG, GIF</small>
                                    </div>
                                    
                                    
                                    <div class="mb-4">
                                        <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Description</label>
                                        <textarea class="form-control summernote" name="description" required style="border-radius: 10px;"></textarea>
                                    </div>
                                    
                                    <!-- BOUTONS EN BAS -->
                                    <div style="display: flex; justify-content: flex-end; gap: 12px;">
                                        <a href="ajouter_lecon.php" class="btn btn-secondary px-4" style="border-radius: 40px; text-decoration: none;">Annuler</a>
                                        <button type="submit" class="btn btn-primary px-4" name="ajouter" style="border-radius: 40px;">Ajouter</button>
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