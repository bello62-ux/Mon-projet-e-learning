<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';

// Vérifier si un chapitre est sélectionné
if(!isset($_GET['chapter_id'])){
    header("Location: details_chapitre.php");
    exit();
}

$chapter_id = $_GET['chapter_id'];

// Récupérer les infos du chapitre
$sql_chapter = "SELECT * FROM Chapters WHERE chapter_id = ?";
$stmt = $conn->prepare($sql_chapter);
$stmt->bind_param("i", $chapter_id);
$stmt->execute();
$chapter = $stmt->get_result()->fetch_assoc();

if(!$chapter){
    header("Location: details_chapitre.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter des sections - Admin</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="../../asset/css/dashboard.css">
</head>
<body style="background: #f5f7fb;">
    <div class="wrapper">
        <?php include '../layout/sidebar.php'; ?>

        <div id="content">
            <?php include '../layout/appbar.php'; ?>

            <div class="page-title">
                <h2>Ajouter des sections</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../layout/dashboard.php" class="text-decoration-none">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="ajouter_chapitre.php" class="text-decoration-none">Chapitres</a></li>
                        <li class="breadcrumb-item"><a href="../details/details_chapitre.php?chapter_id=<?php echo $chapter_id; ?>" class="text-decoration-none">Détails</a></li>
                        <li class="breadcrumb-item active">Ajouter sections</li>
                    </ol>
                </nav>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div style="background: white; border-radius: 20px; overflow: hidden; border: 1px solid #e5e7eb; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div style="background: white; padding: 16px 24px;">
                                <h4 style="margin: 0; color: black; font-size: 1.25rem;">
                                    Ajouter des sections pour : <?php echo htmlspecialchars($chapter['title']); ?>
                                </h4>
                            </div>
                            <div style="padding: 24px;">
                                <form action="../../traitement/traitement_section.php" method="post">
                                    <input type="hidden" name="chapter_id" value="<?php echo $chapter_id; ?>">
                                    <input type="hidden" name="redirect" value="details">

                                    <div id="sections-container">
                                        
                                        <div style="background: white; border-radius: 16px; margin-bottom: 20px; transition: all 0.3s ease; border: 1px solid #e9ecef; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                                            <div style="padding: 14px 20px; background: #fafbfc; border-bottom: 1px solid #eef2f6; border-radius: 16px 16px 0 0; display: flex; justify-content: space-between; align-items: center;">
                                                <div>
                                                    <span style="font-weight: 600; font-size: 0.95rem; color: black">Section 1</span>
                                                </div>
                                                <button type="button" class="btn-remove remove-section" style="display: none; background: transparent; border: 1px solid #ffe0e7; color: #f72585; padding: 5px 12px; border-radius: 30px; font-size: 0.75rem; font-weight: 500;">
                                                    <i class="bi bi-trash me-1"></i> Supprimer
                                                </button>
                                            </div>
                                            <div style="padding: 24px;">
                                                <div class="row">
                                                    <div class="col-12 mb-4">
                                                        <label style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; margin-bottom: 6px; display: block;">Titre</label>
                                                        <input type="text" name="titles[]" style="width: 100%; padding: 10px 14px; font-size: 0.9rem; border: 1.5px solid #e9ecef; border-radius: 10px; background: white;" placeholder="Ex: Introduction, Concepts fondamentaux..." required>
                                                    </div>
                                                    <div class="col-12 mb-4">
                                                        <label style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; margin-bottom: 6px; display: block;">Statut</label>
                                                        <select name="status[]" style="width: 100%; padding: 10px 14px; font-size: 0.9rem; border: 1.5px solid #e9ecef; border-radius: 10px; background: white; cursor: pointer;">
                                                            <option value="1">Actif</option>
                                                            <option value="0">Inactif</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <label style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; margin-bottom: 6px; display: block;">Description</label>
                                                        <textarea class="summernote-editor" name="descriptions[]" rows="4" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div style="display: flex; justify-content: flex-end; gap: 12px;">
                                        <a href="../details/details_chapitre.php?chapter_id=<?php echo $chapter_id; ?>" style="background: white; border: 1.5px solid #e9ecef; padding: 10px 28px; border-radius: 30px; font-weight: 500; font-size: 0.85rem; color: #6c757d; text-decoration: none; margin-left: 10px; display: inline-block;">
                                            Annuler
                                        </a>
                                        <button type="button" id="ajouterLigne" style="background: linear-gradient(135deg, #4361ee, #3f37c9); border: none; padding: 10px 28px; border-radius: 30px; font-weight: 500; font-size: 0.85rem; color: white; transition: all 0.3s ease;">
                                            Ajouter une section
                                        </button>
                                        <button type="submit" name="ajouter" style="background: linear-gradient(135deg, #10b981, #059669); border: none; padding: 10px 28px; border-radius: 30px; font-weight: 500; font-size: 0.85rem; color: white; margin-left: 10px;">
                                            Enregistrer toutes les sections
                                        </button>
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
    
   <script src="../../asset/js/section.js"></script>
</body>
</html>