<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';

if(!isset($_GET['chapter_id'])){
    header("Location: ../cours/ajouter_chapitre.php");
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
    header("Location: ../cours/ajouter_chapitre.php");
    exit();
}

// Récupérer les sections
$sql_sections = "SELECT * FROM Section WHERE chapter_id = ? ORDER BY section_id ASC";
$stmt_sections = $conn->prepare($sql_sections);
$stmt_sections->bind_param("i", $chapter_id);
$stmt_sections->execute();
$sections = $stmt_sections->get_result();

// Message de succès
$success_message = '';
$error_message = '';
if(isset($_GET['success'])) {
    if($_GET['success'] == 'multiple') {
        $success_message = '<i class="bi bi-check-circle-fill me-2"></i>' . $_GET['count'] . ' section(s) ajoutée(s) avec succès !';
    }
    if($_GET['success'] == 'section_add') {
        $success_message = '<i class="bi bi-check-circle-fill me-2"></i>Section ajoutée avec succès !';
    }
    if($_GET['success'] == 'section_edit') {
        $success_message = '<i class="bi bi-check-circle-fill me-2"></i>Section modifiée avec succès !';
    }
    if($_GET['success'] == 'section_delete') {
        $success_message = '<i class="bi bi-check-circle-fill me-2"></i>Section supprimée avec succès !';
    }
}
if(isset($_GET['error']) && $_GET['error'] == 1) {
    $error_message = '<i class="bi bi-exclamation-triangle-fill me-2"></i>Erreur lors de l\'ajout des sections.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du chapitre - Admin</title>
 
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
                                <li><span style="color: #6366f1; font-size: 0.85rem; font-weight: 500;"> Détails</span></li>
                            </ol>
                        </nav>
                        
                        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); margin-bottom: 1.5rem;">
                            <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #eef2ff;">
                                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.5rem;">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        <span style="background: #eef2ff; padding: 4px 10px; border-radius: 30px; font-size: 0.7rem; font-weight: 500; color: #4b5563;">CHAPITRE</span>
                                        <h2 style="color: #0f172a; font-size: 1.3rem; font-weight: 600; margin: 0;">
                                            <?php echo htmlspecialchars($chapter['title']); ?>
                                        </h2>
                                    </div>
                                    <span style="padding: 4px 12px; border-radius: 30px; font-size: 0.7rem; font-weight: 600; background: <?php echo $chapter['is_active'] == 1 ? '#10b981' : '#ef4444'; ?>; color: white;">
                                        <i class="fas fa-circle" style="font-size: 6px; margin-right: 6px;"></i>
                                        <?php echo $chapter['is_active'] == 1 ? 'ACTIF' : 'INACTIF'; ?>
                                    </span>
                                </div>
                            </div>
                            <div style="padding: 1rem 1.5rem;">
                                <div style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
                                    <div style="flex: 2;">
                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                            <span style="font-size: 0.7rem; font-weight: 600; color: #64748b;">DESCRIPTION</span>
                                        </div>
                                        <p style="color: #475569; font-size: 0.85rem; line-height: 1.5; margin-bottom: 0;">
                                            <?php echo nl2br(htmlspecialchars($chapter['description'])); ?>
                                        </p>
                                    </div>
                                    <div style="flex: 1;">
                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                            <span style="font-size: 0.7rem; font-weight: 600; color: #64748b;">DATE DE CRÉATION</span>
                                        </div>
                                        <p style="font-weight: 500; color: #0f172a; font-size: 0.85rem; margin-bottom: 0;">
                                            <?php echo $chapter['date_creation']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                            <div style="background: #10b981; padding: 0.8rem 1.5rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.5rem;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <span style="color: white; font-weight: 500; font-size: 0.9rem;">SECTIONS</span>
                                    <span style="background: rgba(255,255,255,0.2); padding: 2px 10px; border-radius: 30px; font-size: 0.7rem; color: white;"><?php echo $sections->num_rows; ?></span>
                                </div>
                                <a href="../cours/ajouter_section.php?chapter_id=<?php echo $chapter_id; ?>" style="background: white; color: #10b981; padding: 4px 14px; border-radius: 30px; text-decoration: none; font-size: 0.75rem; font-weight: 500; display: inline-flex; align-items: center; gap: 6px;">
                                    Ajouter
                                </a>
                            </div>
                            <div style="padding: 1rem;">
                                <?php if($sections->num_rows > 0): ?>
                                    <?php while($section = $sections->fetch_assoc()): ?>
                                        <div style="background: white; border-radius: 20px; border: 1px solid #eef2ff; margin-bottom: 1rem; overflow: hidden;">
                                            <div style="padding: 0.8rem 1.2rem; border-bottom: 1px solid #f0f2f5; background: #fafcff;">
                                                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                                                    <div style="display: flex; align-items: center; gap: 10px;">
                                                        <div style="width: 28px; height: 28px; background: linear-gradient(135deg, #6366f1, #8b5cf6); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fas fa-layer-group" style="color: white; font-size: 0.7rem;"></i>
                                                        </div>
                                                        <span style="font-size: 0.65rem; font-weight: 600; color: #64748b;">TITRE :</span>
                                                        <h5 style="font-size: 0.9rem; font-weight: 600; color: #0f172a; margin: 0;"><?php echo htmlspecialchars($section['title']); ?></h5>
                                                    </div>
                                                    <div>
                                                        <span style="font-size: 0.65rem; font-weight: 600; color: #64748b;">STATUT :</span>
                                                        <?php if($section['is_active'] == 1): ?>
                                                            <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 10px; border-radius: 30px; font-size: 0.65rem; font-weight: 500; background: #d1fae5; color: #059669;">
                                                                <i class="fas fa-check-circle"></i> Actif
                                                            </span>
                                                        <?php else: ?>
                                                            <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 10px; border-radius: 30px; font-size: 0.65rem; font-weight: 500; background: #fee2e2; color: #dc2626;">
                                                                <i class="fas fa-ban"></i> Inactif
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="padding: 0.8rem 1.2rem;">
                                                <div style="margin-left: 38px;">
                                                    <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 6px;">
                                                        <span style="font-size: 0.65rem; font-weight: 600; color: #64748b;">DESCRIPTION :</span>
                                                    </div>
                                                    <p style="color: #64748b; font-size: 0.8rem; line-height: 1.5; margin-bottom: 0;">
                                                        <?php 
                                                        $description_brute = strip_tags($section['description']); 
                                                        echo htmlspecialchars($description_brute);
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div style="padding: 0.6rem 1.2rem; background: #fafcff; border-top: 1px solid #f0f2f5; display: flex; justify-content: flex-end; gap: 8px;">
                                                <a href="details_section.php?section_id=<?php echo $section['section_id']; ?>&chapter_id=<?php echo $chapter_id; ?>" style="background: #f1f5f9; color: #475569; border-radius: 30px; padding: 4px 14px; font-size: 0.7rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                                                    <i class="fas fa-eye me-1"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalModifierSection" 
                                                    data-id="<?php echo $section['section_id']; ?>"
                                                    data-title="<?php echo htmlspecialchars($section['title']); ?>"
                                                    data-description="<?php echo htmlspecialchars($section['description']); ?>"
                                                    data-active="<?php echo $section['is_active']; ?>"
                                                    style="border-radius: 30px; padding: 4px 14px; font-size: 0.7rem; border: 1px solid #e2e8f0;">
                                                    <i class="fas fa-pencil-alt me-1"></i>
                                                </button>
                                                <button type="button" style="background: transparent; border: none; padding: 6px 8px; border-radius: 8px; color: #94a3b8;" 
                                                    onclick="ouvrirModalSuppression(<?php echo $section['section_id']; ?>, '<?php echo addslashes($section['title']); ?>', <?php echo $chapter_id; ?>)" 
                                                    onmouseover="this.style.backgroundColor='#fee2e2'; this.style.color='#ef4444'" 
                                                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#94a3b8'">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <div style="text-align: center; padding: 2rem;">
                                        <i class="fas fa-folder-open" style="font-size: 40px; color: #cbd5e1;"></i>
                                        <p style="color: #94a3b8; margin-top: 0.8rem;">Aucune section dans ce chapitre</p>
                                        <a href="../cours/ajouter_section.php?chapter_id=<?php echo $chapter_id; ?>" class="btn btn-primary btn-sm" style="border-radius: 30px; text-decoration: none;">
                                            Créer une section
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL POUR MODIFIER UNE SECTION -->
    <div class="modal fade" id="modalModifierSection" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 24px;">
                <div class="modal-header" style="background: white; border-bottom: 1px solid #eef2ff; border-radius: 10px 10px 0 0;">
                    <h5 class="modal-title">Modifier la section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="../../traitement/traitement_modification_section.php" method="post">
                        <input type="hidden" name="section_id" id="modif_section_id">
                        <input type="hidden" name="chapter_id" value="<?php echo $chapter_id; ?>">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="modif_title" name="title" required style="border-radius: 12px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="modif_description" name="description" rows="4" required style="border-radius: 12px;"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Statut</label>
                            <select class="form-select" id="modif_is_active" name="is_active" style="border-radius: 12px;">
                                <option value="1">Actif</option>
                                <option value="0">Inactif</option>
                            </select>
                        </div>
                        <div style="display: flex; justify-content: flex-end; gap: 12px;">
                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 40px;">Annuler</button>
                            <button type="submit" class="btn btn-primary px-4" name="modifier" style="border-radius: 40px;">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CONFIRMATION SUPPRESSION -->
    <div class="modal fade" id="modalConfirmationSuppression" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="border-radius: 8px;">
                <div class="modal-body text-center py-4">
                    <p class="mt-3 mb-0" id="modalSuppressionMessage">Voulez-vous vraiment supprimer cette section ?</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0 pb-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 8px;">Annuler</button>
                    <a href="#" id="btnConfirmSupprimer" class="btn btn-danger px-4" style="border-radius: 8px;">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalModifier = document.getElementById('modalModifierSection');
            if(modalModifier) {
                modalModifier.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    document.getElementById('modif_section_id').value = button.getAttribute('data-id');
                    document.getElementById('modif_title').value = button.getAttribute('data-title');
                
                    var description = button.getAttribute('data-description');
                    var tempDiv = document.createElement('div');
                    tempDiv.innerHTML = description;
                    var textDescription = tempDiv.textContent || tempDiv.innerText || '';
                    document.getElementById('modif_description').value = textDescription;
                
                    document.getElementById('modif_is_active').value = button.getAttribute('data-active');
                });
            }
        });



        
    </script>

    <script src="../../asset/js/section.js"></script>
</body>
</html>