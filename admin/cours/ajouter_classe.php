<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

// Importer la connexion BDD
require_once '../../config/db.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des classes - Admin</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;"> Classes</span></li>
                            </ol>
                        </nav>
                        
                        
                        <div style="margin-bottom: 1.2rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Gestion des classes</h2>
                        </div>
                        
                        <!-- Messages -->
                        <?php if(isset($_GET['success'])): ?>
                            <div style="background: #d1fae5; color: #065f46; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                <span><i class="bi bi-check-circle-fill me-2"></i> Classe ajoutée avec succès !</span>
                                <button type="button" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['modif'])): ?>
                            <div style="background: #d1fae5; color: #065f46; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                <span><i class="bi bi-check-circle-fill me-2"></i> Classe modifiée avec succès !</span>
                                <button type="button" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['delete'])): ?>
                            <div style="background: #d1fae5; color: #065f46; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                <span><i class="bi bi-check-circle-fill me-2"></i> Classe supprimée avec succès !</span>
                                <button type="button" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['error']) && $_GET['error'] == 'has_lessons'): ?>
                            <div style="background: #fee2e2; color: #991b1b; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem;">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <?php if(isset($_GET['count']) && $_GET['count'] == 1): ?>
                                    ⚠️ Impossible de supprimer : cette classe contient <strong>1 leçon</strong>.
                                <?php else: ?>
                                    ⚠️ Impossible de supprimer : cette classe contient <strong><?php echo $_GET['count']; ?> leçons</strong>.
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['error']) && $_GET['error'] == 'has_users'): ?>
                            <div style="background: #fee2e2; color: #991b1b; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem;">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <?php if(isset($_GET['count']) && $_GET['count'] == 1): ?>
                                    ⚠️ Impossible de supprimer : cette classe contient <strong>1 élève</strong>.
                                <?php else: ?>
                                    ⚠️ Impossible de supprimer : cette classe contient <strong><?php echo $_GET['count']; ?> élèves</strong>.
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        
                        <div style="margin-bottom: 1rem; text-align: right;">
                            <button type="button" style="background: #3b82f6; border: none; color: white; padding: 8px 20px; border-radius: 40px; font-weight: 500; font-size: 0.85rem;" data-bs-toggle="modal" data-bs-target="#modalAjouterClasse">
                                <i class="bi bi-plus-circle"></i> Ajouter une classe
                            </button>
                        </div>

                        <!-- Liste des classes -->
                        <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div style="padding: 1rem 1.2rem; border-bottom: 1px solid #eef2ff;">
                                <h4 style="margin: 0; font-size: 1rem; font-weight: 600; color: #0f172a;">Liste des classes</h4>
                            </div>
                            <div style="overflow-x: auto;">
                                <?php
                                $sql = "SELECT * FROM classroom ORDER BY classroom_id DESC";
                                $resultat = $conn->query($sql);

                                if ($resultat->num_rows > 0) {
                                    echo '<table style="width: 100%; border-collapse: collapse;">';
                                    echo '<thead>';
                                    echo '   <tr>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">ID</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: left;">Nom</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: left;">Description</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Actions</th>';
                                    echo '   </tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = $resultat->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '   <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; color: #1e293b; font-size: 0.85rem; text-align: center;">' . $row["classroom_id"] . '</td>';
                                        echo '   <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; color: #1e293b; font-size: 0.85rem;">' . htmlspecialchars($row["name"]) . '</td>';
                                        echo '   <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; color: #64748b; font-size: 0.8rem;">' . htmlspecialchars($row["description"]) . '</td>';
                                        echo '   <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; text-align: center;">';
                                        echo '      <div style="display: flex; gap: 4px; justify-content: center; align-items: center;">';
                                        echo '         <button type="button" style="background: transparent; border: none; padding: 6px 8px; border-radius: 8px; color: #94a3b8;" data-bs-toggle="modal" data-bs-target="#modalModifierClasse" data-id="' . $row["classroom_id"] . '" data-nom="' . htmlspecialchars($row["name"]) . '" data-description="' . htmlspecialchars($row["description"]) . '" onmouseover="this.style.backgroundColor=\'#f1f5f9\'; this.style.color=\'#3b82f6\'" onmouseout="this.style.backgroundColor=\'transparent\'; this.style.color=\'#94a3b8\'"><i class="bi bi-pencil"></i></button>';
                                        echo '         <button type="button" style="background: transparent; border: none; padding: 6px 8px; border-radius: 8px; color: #94a3b8;" onclick="ouvrirModalSuppression(' . $row["classroom_id"] . ', \'' . addslashes($row["name"]) . '\')" onmouseover="this.style.backgroundColor=\'#fee2e2\'; this.style.color=\'#ef4444\'" onmouseout="this.style.backgroundColor=\'transparent\'; this.style.color=\'#94a3b8\'"><i class="bi bi-trash"></i></button>';
                                        echo '      </div>';
                                        echo '   </td>';
                                        echo '</tr>';
                                    }

                                    echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo '<div style="text-align: center; padding: 3rem;">';
                                    echo '<i class="bi bi-inbox" style="font-size: 2.5rem; color: #cbd5e1;"></i>';
                                    echo '<p style="color: #94a3b8; margin-top: 0.5rem;">Aucune classe trouvée</p>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL AJOUTER -->
    <div class="modal fade" id="modalAjouterClasse" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header" style="background: white; border-bottom: 1px solid #eef2ff; border-radius: 10px 10px 0 0;">
                    <h5 class="modal-title" style="color: #0f172a;">Ajouter une classe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding: 1.5rem;">
                    <form action="../../traitement/traitement_classe.php" method="post">
                        <div class="mb-3">
                            <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Nom de la classe</label>
                            <input type="text" class="form-control" name="name" required style="border-radius: 10px;">
                        </div>
                        <div class="mb-3">
                            <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Description</label>
                            <textarea class="form-control" name="description" rows="3" required style="border-radius: 10px;"></textarea>
                        </div>
                        <div style="display: flex; justify-content: flex-end; gap: 12px;">
                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 40px;">Annuler</button>
                            <button type="submit" class="btn btn-primary px-4" name="ajouter" style="border-radius: 40px;">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL MODIFIER -->
    <div class="modal fade" id="modalModifierClasse" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header" style="background: white; border-bottom: 1px solid #eef2ff; border-radius: 10px 10px 0 0;">
                    <h5 class="modal-title" style="color: #0f172a;">Modifier une classe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding: 1.5rem;">
                    <form action="../../traitement/traitement_modification_classe.php" method="post">
                        <input type="hidden" name="classroom_id" id="modif_classroom_id">
                        <div class="mb-3">
                            <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Nom de la classe</label>
                            <input type="text" class="form-control" id="modif_nom" name="name" required style="border-radius: 10px;">
                        </div>
                        <div class="mb-3">
                            <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Description</label>
                            <textarea class="form-control" id="modif_description" name="description" rows="3" required style="border-radius: 10px;"></textarea>
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

    <!--modal pour supprimer-->
    <div class="modal fade" id="modalConfirmationSuppression" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="border-radius: 8px;">
                <div class="modal-body text-center py-4">
                    <p class="mt-3 mb-0" id="modalSuppressionMessage">Voulez-vous vraiment supprimer cette matière ?</p>
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
    
    <script src="../../asset/js/classe.js"></script>
</body>
</html>