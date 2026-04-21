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
    <title>Gestion des cours - Admin</title>
    
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
                        
                        <!-- Fil d'Ariane -->
                        <nav style="margin-bottom: 1rem;">
                            <ol style="display: flex; flex-wrap: wrap; list-style: none; padding: 0; margin: 0; gap: 8px;">
                                <li><a href="../layout/dashboard.php" style="color: #6c757d; text-decoration: none; font-size: 1rem;  font-weight: 500;">Accueil</a> <span style="color: #adb5bd;">/</span></li>
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;">Cours</span></li>
                            </ol>
                        </nav>
                        
                        <!-- Titre -->
                        <div style="margin-bottom: 1.2rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Gestion des cours</h2>
                        </div>
                        
                        <!-- Messages -->
                        <?php if(isset($_GET['success'])): ?>
                            <div style="background: #d1fae5; color: #065f46; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                <span><i class="bi bi-check-circle-fill me-2"></i> Cours ajouté avec succès !</span>
                                <button type="button" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['modif'])): ?>
                            <div style="background: #d1fae5; color: #065f46; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                <span><i class="bi bi-check-circle-fill me-2"></i> Cours modifié avec succès !</span>
                                <button type="button" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['delete'])): ?>
                            <div style="background: #d1fae5; color: #065f46; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                <span><i class="bi bi-check-circle-fill me-2"></i> Cours supprimé avec succès !</span>
                                <button type="button" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['error']) && $_GET['error'] == 'has_chapters'): ?>
                            <div style="background: #fee2e2; color: #991b1b; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem;">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <?php if(isset($_GET['count']) && $_GET['count'] == 1): ?>
                                    ⚠️ Impossible de supprimer : ce cours contient <strong>1 chapitre</strong>.
                                <?php else: ?>
                                    ⚠️ Impossible de supprimer : ce cours contient <strong><?php echo $_GET['count']; ?> chapitres</strong>.
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Bouton ajout - redirige vers la page d'ajout -->
                        <div style="margin-bottom: 1rem; text-align: right;">
                            <a href="ajout_lecon.php" style="background: #3b82f6; border: none; color: white; padding: 8px 20px; border-radius: 40px; font-weight: 500; font-size: 0.85rem; text-decoration: none; display: inline-block;">
                                <i class="bi bi-plus-circle"></i> Ajouter un cours
                            </a>
                        </div>

                        <!-- Liste des cours -->
                        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div style="padding: 1rem 1.2rem; border-bottom: 1px solid #eef2ff;">
                                <h4 style="margin: 0; font-size: 1rem; font-weight: 600; color: #0f172a;">Liste des cours</h4>
                            </div>
                            <div style="overflow-x: auto;">
                                <?php
                                $sql = "SELECT l.*, c.name as class_name, s.name as subject_name, m.media_path
                                        FROM Lessons l
                                        LEFT JOIN Classroom c ON l.classroom_id = c.classroom_id
                                        LEFT JOIN Subject s ON l.subject_id = s.subject_id
                                        LEFT JOIN Media m ON l.lessons_id = m.lessons_id
                                        ORDER BY l.lessons_id DESC";
                                $resultat = $conn->query($sql);

                                if ($resultat->num_rows > 0) {
                                    echo '<table style="width: 100%; border-collapse: collapse;">';
                                    echo '<thead>';
                                    echo '    <tr>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">ID</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Image</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: left;">Titre</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Classe</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Matière</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Durée</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Statut</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Actions</th>';
                                    echo '    </thead>';
                                    echo '<tbody>';

                                    while ($row = $resultat->fetch_assoc()) {
                                        echo '    <tr>';
                                        echo '      <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; color: #1e293b; font-size: 0.85rem; text-align: center;">' . $row["lessons_id"] . '</td>';
                                        echo '      <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; text-align: center;">';
                                        if(!empty($row["media_path"])) {
                                            echo '<img src="../../' . $row["media_path"] . '" alt="image" style="width: 32px; height: 32px; border-radius: 8px; object-fit: cover;">';
                                        } else {
                                            echo '<i class="bi bi-image" style="color: #94a3b8; font-size: 1.2rem;"></i>';
                                        }
                                        echo '       </td>';
                                        echo '      <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; color: #1e293b; font-size: 0.85rem;">' . htmlspecialchars($row["title"]) . '</td>';
                                        echo '      <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; color: #1e293b; font-size: 0.85rem; text-align: center;">' . ($row["class_name"] ?? '<span style="color: #94a3b8;">—</span>') . '</td>';
                                        echo '      <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; color: #1e293b; font-size: 0.85rem; text-align: center;">' . ($row["subject_name"] ?? '<span style="color: #94a3b8;">—</span>') . '</td>';
                                        echo '      <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; color: #1e293b; font-size: 0.85rem; text-align: center;">' . ($row["time"] ? $row["time"] . ' min' : '<span style="color: #94a3b8;">—</span>') . '</td>';
                                        echo '      <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; text-align: center;">';
                                        if($row["is_active"] == 1) {
                                            echo '<span style="background: #e6f7e6; color: #2e7d32; padding: 4px 10px; border-radius: 30px; font-size: 0.7rem; font-weight: 500;">Actif</span>';
                                        } else {
                                            echo '<span style="background: #ffe6e6; color: #c62828; padding: 4px 10px; border-radius: 30px; font-size: 0.7rem; font-weight: 500;">Inactif</span>';
                                        }
                                        echo '       </td>';
                                        echo '      <td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; text-align: center;">';
                                        echo '        <div style="display: flex; gap: 4px; justify-content: center; align-items: center;">';
                                        echo '          <a href="../details/details_lecon.php?lessons_id=' . $row["lessons_id"] . '" style="background: transparent; border: none; padding: 6px 8px; border-radius: 8px; color: #94a3b8; display: inline-block; text-decoration: none;" onmouseover="this.style.backgroundColor=\'#f1f5f9\'; this.style.color=\'#3b82f6\'" onmouseout="this.style.backgroundColor=\'transparent\'; this.style.color=\'#94a3b8\'"><i class="bi bi-eye"></i></a>';
                                        echo '          <a href="modifier_lecon.php?lessons_id=' . $row["lessons_id"] . '" style="background: transparent; border: none; padding: 6px 8px; border-radius: 8px; color: #94a3b8; display: inline-block; text-decoration: none;" onmouseover="this.style.backgroundColor=\'#f1f5f9\'; this.style.color=\'#3b82f6\'" onmouseout="this.style.backgroundColor=\'transparent\'; this.style.color=\'#94a3b8\'"><i class="bi bi-pencil"></i></a>';
                                         echo '         <button type="button" style="background: transparent; border: none; padding: 6px 8px; border-radius: 8px; color: #94a3b8;" onclick="ouvrirModalSuppression(' . $row["lessons_id"] . ', \'' . addslashes($row["title"]) . '\')" onmouseover="this.style.backgroundColor=\'#fee2e2\'; this.style.color=\'#ef4444\'" onmouseout="this.style.backgroundColor=\'transparent\'; this.style.color=\'#94a3b8\'"><i class="bi bi-trash"></i></button>';
                                        echo '        </div>';
                                        echo '       </td>';
                                        echo '     </tr>';
                                    }

                                    echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo '<div style="text-align: center; padding: 3rem;">';
                                    echo '<i class="bi bi-inbox" style="font-size: 2.5rem; color: #cbd5e1;"></i>';
                                    echo '<p style="color: #94a3b8; margin-top: 0.5rem;">Aucun cours trouvé</p>';
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

    <!-- MODAL CONFIRMATION SUPPRESSION -->
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
    
    <script src="../../asset/js/lecon.js"></script>
</body>
</html>