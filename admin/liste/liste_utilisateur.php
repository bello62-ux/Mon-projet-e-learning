<?php
session_start();

// Vérifier si l'utilisateur est admin
if(!isset($_SESSION['user_id'])){
    header("Location: ../authentification/login.php");
    exit();
}

if($_SESSION['is_admin'] != 1){
    header("Location: ../../index.php");
    exit();
}

$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants - Admin</title>
 
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
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;">Étudiants</span></li>
                            </ol>
                        </nav>
                        
                        <div style="margin-bottom: 1.2rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Gestion des étudiants</h2>
                        </div>
                        
                        <!-- Messages -->
                        <?php if(isset($_GET['success']) && $_GET['success'] == 'blocked'): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> Étudiant bloqué avec succès !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['success']) && $_GET['success'] == 'unblocked'): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> Étudiant débloqué avec succès !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['success']) && $_GET['success'] == 'deleted'): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> Étudiant supprimé avec succès !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_GET['error']) && $_GET['error'] == 'self_action'): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> ⚠️ Vous ne pouvez pas bloquer ou supprimer votre propre compte !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Liste des étudiants -->
                        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div style="padding: 1rem 1.2rem; border-bottom: 1px solid #eef2ff;">
                                <h4 style="margin: 0; font-size: 1rem; font-weight: 600; color: #0f172a;">Liste des étudiants</h4>
                            </div>
                            <div style="overflow-x: auto;">
                                <?php
                                try {
                                    // Afficher UNIQUEMENT les étudiants (role = 'etudiant')
                                    $sql = "SELECT user_id, first_name, last_name, email, telephone, is_active, role, date_creation 
                                            FROM Users 
                                            WHERE role = 'etudiant' 
                                            ORDER BY user_id DESC";
                                    
                                    $resultat = $conn->query($sql);

                                    if ($resultat && $resultat->num_rows > 0) {
                                        echo '<table class="table table-hover" style="width: 100%; margin-bottom: 0;">';
                                        echo '<thead>';
                                        echo '<tr style="background: #f8f9fa;">';
                                        echo '  <th style="padding: 12px 8px; text-align: center; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase;">ID</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase;">Prénom</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase;">Nom</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase;">Email</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: center; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase;">Téléphone</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: center; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase;">Statut</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: center; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase;">Date inscription</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: center; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase;">Actions</th>';
                                        echo '</thead>';
                                        echo '<tbody>';

                                        while ($row = $resultat->fetch_assoc()) {
                                            $user_id = intval($row["user_id"]);
                                            $first_name = htmlspecialchars($row["first_name"]);
                                            $last_name = htmlspecialchars($row["last_name"]);
                                            $full_name = $first_name . ' ' . $last_name;
                                            $email = htmlspecialchars($row["email"]);
                                            $telephone = !empty($row["telephone"]) ? htmlspecialchars($row["telephone"]) : '<span style="color: #94a3b8;">—</span>';
                                            $date_created = date('d/m/Y', strtotime($row["date_creation"]));
                                            
                                        
                                            echo '<td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; text-align: center; vertical-align: middle;">' . $user_id . '';
                                            echo '<td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">' . $first_name . '';
                                            echo '<td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">' . $last_name . '';
                                            echo '<td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">' . $email . '';
                                            echo '<td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; text-align: center; vertical-align: middle;">' . $telephone . '';
                                            echo '<td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; text-align: center; vertical-align: middle;">';
                                            
                                            if($row["is_active"] == 1) {
                                                echo '<span class="badge" style="background: #e6f7e6; color: #2e7d32; padding: 4px 12px; border-radius: 30px; font-size: 0.7rem; font-weight: 500;">Actif</span>';
                                            } else {
                                                echo '<span class="badge" style="background: #ffe6e6; color: #c62828; padding: 4px 12px; border-radius: 30px; font-size: 0.7rem; font-weight: 500;">Bloqué</span>';
                                            }
                                          
                                            echo '<td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; text-align: center; vertical-align: middle; font-size: 0.8rem; color: #64748b;">' . $date_created . '';
                                            echo '<td style="padding: 14px 8px; border-bottom: 1px solid #f0f2f5; text-align: center; vertical-align: middle;">';
                                            echo '<div class="btn-group" role="group">';
                                            
                                            // Vérifier si c'est l'utilisateur connecté
                                            if($user_id != $_SESSION['user_id']) {
                                                // Bouton Bloquer/Débloquer
                                                if($row["is_active"] == 1) {
                                                    echo '<button type="button" class="btn btn-sm btn-outline-danger" title="Bloquer" onclick="ouvrirModalBloquer(' . $user_id . ', \'' . addslashes($full_name) . '\')"><i class="bi bi-lock"></i></button>';
                                                } else {
                                                    echo '<button type="button" class="btn btn-sm btn-outline-success" title="Débloquer" onclick="ouvrirModalDebloquer(' . $user_id . ', \'' . addslashes($full_name) . '\')"><i class="bi bi-unlock"></i></button>';
                                                }
                                                // Bouton Supprimer
                                                echo '<button type="button" class="btn btn-sm btn-outline-danger" title="Supprimer" onclick="ouvrirModalSuppression(' . $user_id . ', \'' . addslashes($full_name) . '\')"><i class="bi bi-trash"></i></button>';
                                            } else {
                                                echo '<span class="badge bg-secondary">Vous-même</span>';
                                            }
                                            
                                            echo '</div>';
                                            echo '</tr>';
                                        }

                                        echo '</tbody>';
                                        echo '<tr>';
                                    } else {
                                        echo '<div style="text-align: center; padding: 3rem;">';
                                        echo '<i class="bi bi-inbox" style="font-size: 2.5rem; color: #cbd5e1;"></i>';
                                        echo '<p style="color: #94a3b8; margin-top: 0.5rem;">Aucun étudiant inscrit</p>';
                                        echo '</div>';
                                    }
                                } catch (Exception $e) {
                                    echo '<div class="alert alert-danger m-3">';
                                    echo '<i class="bi bi-exclamation-triangle-fill me-2"></i>';
                                    echo 'Erreur lors de la récupération des étudiants : ' . htmlspecialchars($e->getMessage());
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

    <div class="modal fade" id="modalConfirmationBloquer" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="border-radius: 8px;">
                <div class="modal-body text-center py-4">
                    <p class="mt-3 mb-0" id="modalBloquerMessage">Voulez-vous vraiment bloquer cet étudiant ?</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0 pb-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 8px;">Annuler</button>
                    <a href="#" id="btnConfirmBloquer" class="btn btn-danger px-4" style="border-radius: 8px;">Bloquer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CONFIRMATION DÉBLOQUER -->
    <div class="modal fade" id="modalConfirmationDebloquer" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="border-radius: 8px;">
                <div class="modal-body text-center py-4">
                    <p class="mt-3 mb-0" id="modalDebloquerMessage">Voulez-vous vraiment débloquer cet étudiant ?</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0 pb-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 8px;">Annuler</button>
                    <a href="#" id="btnConfirmDebloquer" class="btn btn-success px-4" style="border-radius: 8px;">Débloquer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CONFIRMATION SUPPRESSION -->
    <div class="modal fade" id="modalConfirmationSuppression" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="border-radius: 8px;">
                <div class="modal-body text-center py-4">
                    <p class="mt-3 mb-0" id="modalSuppressionMessage">Voulez-vous vraiment supprimer cet étudiant ?</p>
                    <small class="text-muted">Cette action est irréversible.</small>
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
    
    <script src="../../asset/js/utilisateur.js"></script>
</body>
</html>