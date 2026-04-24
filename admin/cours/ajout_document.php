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
    <title>Gestion des documents - Admin</title>
    
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
                                <li><a href="../layout/dashboard.php" style="color: #6c757d; text-decoration: none; font-size: 1rem; font-weight: 500;">Accueil</a> <span style="color: #adb5bd;">/</span></li>
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;">Documents</span></li>
                            </ol>
                        </nav>
                        
                        <div style="margin-bottom: 1.2rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Gestion des documents</h2>
                        </div>
                        
                        <?php if(isset($_GET['success'])): ?>
                            <div style="background: #d1fae5; color: #065f46; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                <span><i class="bi bi-check-circle-fill me-2"></i> Document ajouté avec succès !</span>
                                <button type="button" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['modif'])): ?>
                            <div style="background: #d1fae5; color: #065f46; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                <span><i class="bi bi-check-circle-fill me-2"></i> Document modifié avec succès !</span>
                                <button type="button" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['delete'])): ?>
                            <div style="background: #d1fae5; color: #065f46; padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                <span><i class="bi bi-check-circle-fill me-2"></i> Document supprimé avec succès !</span>
                                <button type="button" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</button>
                            </div>
                        <?php endif; ?>

                        <div style="margin-bottom: 1rem; text-align: right;">
                            <a href="ajouter_document.php" style="background: #3b82f6; border: none; color: white; padding: 8px 20px; border-radius: 40px; font-weight: 500; font-size: 0.85rem; text-decoration: none; display: inline-block;">
                                <i class="bi bi-plus-circle"></i> Ajouter un document
                            </a>
                        </div>

                        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div style="padding: 1rem 1.2rem; border-bottom: 1px solid #eef2ff;">
                                <h4 style="margin: 0; font-size: 1rem; font-weight: 600; color: #0f172a;">Liste des documents</h4>
                            </div>
                            <div style="overflow-x: auto;">
                                <?php
                                $sql = "SELECT d.*, 
                                        td.libelle_typeDoc, 
                                        s.name as matiere_nom, 
                                        c.name as classe_nom
                                        FROM Document d
                                        LEFT JOIN TypeDocument td ON d.typedocument_id = td.typedocument_id
                                        LEFT JOIN Subject s ON d.subject_id = s.subject_id
                                        LEFT JOIN Classroom c ON d.classroom_id = c.classroom_id
                                        ORDER BY d.document_id DESC";
                                $resultat = $conn->query($sql);

                                if ($resultat->num_rows > 0) {
                                    echo '<table style="width: 100%; border-collapse: collapse;">';
                                    echo '<thead>';
                                    echo '    <tr>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">ID</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Photo</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: left;">Nom</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Type</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Classe</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Matière</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Prix</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Statut</th>';
                                    echo '      <th style="background: transparent; color: #6c757d; font-weight: 600; font-size: 0.7rem; text-transform: uppercase; padding: 12px 8px; border-bottom: 1px solid #e9ecef; text-align: center;">Actions</th>';
                                    echo '    </thead>';
                                    echo '<tbody>';

                                    while ($row = $resultat->fetch_assoc()) {
                                        $photo_path = !empty($row["photo"]) ? '../../' . $row["photo"] : '../../media/images/default-document.jpg';
                                        
                                        // Affichage du prix
                                        $prix_display = '';
                                        if($row["prix"] > 0) {
                                            $prix_display = '<span style="color: #e67e22; font-weight: 600;">' . number_format($row["prix"], 0, ',', ' ') . ' FCFA</span>';
                                        } else {
                                            $prix_display = '<span style="color: #10b981;">Gratuit</span>';
                                        }
                                        
                                        echo '    <tr>';
                                        echo '      <td style="padding: 14px 8px; text-align: center;">' . $row["document_id"] . '</td>';
                                        echo '      <td style="padding: 14px 8px; text-align: center;"><img src="' . $photo_path . '" style="width: 40px; height: 40px; object-fit: cover; border-radius: 8px;"></td>';
                                        echo '      <td style="padding: 14px 8px;">' . htmlspecialchars($row["nom_document"]) . '</td>';
                                        
                                        $type_text = htmlspecialchars($row["libelle_typeDoc"] ?? '—');
                                        echo '      <td style="padding: 14px 8px; text-align: center;">' . $type_text . '</td>';
                                        echo '      <td style="padding: 14px 8px; text-align: center;">' . htmlspecialchars($row["classe_nom"] ?? '—') . '</td>';
                                        echo '      <td style="padding: 14px 8px; text-align: center;">' . htmlspecialchars($row["matiere_nom"] ?? '—') . '</td>';
                                        echo '      <td style="padding: 14px 8px; text-align: center;">' . $prix_display . '</td>';
                                        echo '      <td style="padding: 14px 8px; text-align: center;">';
                                        if($row["active"] == 1) {
                                            echo '<span style="background: #e6f7e6; color: #2e7d32; padding: 4px 10px; border-radius: 30px; font-size: 0.7rem;">Actif</span>';
                                        } else {
                                            echo '<span style="background: #ffe6e6; color: #c62828; padding: 4px 10px; border-radius: 30px; font-size: 0.7rem;">Inactif</span>';
                                        }
                                        echo '        </td>';
                                        echo '      <td style="padding: 14px 8px; text-align: center;">';
                                        echo '        <div style="display: flex; gap: 4px; justify-content: center;">';
                                        echo '          <a href="../details/details_document.php?document_id=' . $row["document_id"] . '" style="background: transparent; border: none; padding: 6px 8px; border-radius: 8px; color: #94a3b8;"><i class="bi bi-eye"></i></a>';
                                        echo '          <a href="modifier_document.php?document_id=' . $row["document_id"] . '" style="background: transparent; border: none; padding: 6px 8px; border-radius: 8px; color: #94a3b8;"><i class="bi bi-pencil"></i></a>';
                                        echo '          <button type="button" style="background: transparent; border: none; padding: 6px 8px; border-radius: 8px; color: #94a3b8;" onclick="ouvrirModalSuppression(' . $row["document_id"] . ', \'' . addslashes($row["nom_document"]) . '\')"><i class="bi bi-trash"></i></button>';
                                        echo '        </div>';
                                        echo '        </td>';
                                        echo '    </tr>';
                                    }

                                    echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo '<div style="text-align: center; padding: 3rem;">';
                                    echo '<i class="bi bi-inbox" style="font-size: 2.5rem; color: #cbd5e1;"></i>';
                                    echo '<p style="color: #94a3b8;">Aucun document trouvé</p>';
                                    echo '<a href="ajouter_document.php" class="btn btn-primary mt-3">Ajouter un document</a>';
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
                    <p class="mt-3 mb-0" id="modalSuppressionMessage">Voulez-vous vraiment supprimer ce document ?</p>
                    <small class="text-muted">Cette action est irréversible.</small>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0 pb-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 8px;">Annuler</button>
                    <a href="#" id="btnConfirmSupprimer" class="btn btn-danger px-4" style="border-radius: 8px;">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function ouvrirModalSuppression(id, nom) {
            var modal = document.getElementById('modalConfirmationSuppression');
            var btnConfirmer = document.getElementById('btnConfirmSupprimer');
            var message = document.getElementById('modalSuppressionMessage');
            
            btnConfirmer.href = '../../delete/supprimer_document.php?document_id=' + id;
            message.innerHTML = 'Voulez-vous vraiment supprimer le document <strong>' + nom + '</strong> ?';
            
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        }
    </script>
</body>
</html>