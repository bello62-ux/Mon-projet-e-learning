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
    <title>Gestion des utilisateurs - Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../asset/css/dashboard.css">
    
    <style>
        /* Supprimer le scroll horizontal */
        .table-responsive-fix {
            overflow-x: visible !important;
        }
        table {
            width: 100% !important;
            table-layout: fixed;
        }
        th, td {
            word-wrap: break-word;
            white-space: normal !important;
        }
        /* Ajuster les largeurs des colonnes */
        th:nth-child(1), td:nth-child(1) { width: 5%; }  /* ID */
        th:nth-child(2), td:nth-child(2) { width: 10%; } /* Prénom */
        th:nth-child(3), td:nth-child(3) { width: 10%; } /* Nom */
        th:nth-child(4), td:nth-child(4) { width: 20%; } /* Email */
        th:nth-child(5), td:nth-child(5) { width: 10%; } /* Téléphone */
        th:nth-child(6), td:nth-child(6) { width: 10%; } /* Rôle */
        th:nth-child(7), td:nth-child(7) { width: 8%; }  /* Statut */
        th:nth-child(8), td:nth-child(8) { width: 12%; } /* Date création */
        th:nth-child(9), td:nth-child(9) { width: 10%; } /* Actions */
        
        @media (max-width: 992px) {
            th, td {
                font-size: 0.75rem;
                padding: 8px 4px !important;
            }
        }
    </style>
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
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;">Administrateurs et Responsables</span></li>
                            </ol>
                        </nav>
                        
                        <div style="margin-bottom: 1.2rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Gestion des Administrateurs et Responsables</h2>
                        </div>
                        
                        <!-- Messages -->
                        <?php if(isset($_GET['success']) && $_GET['success'] == 'deleted'): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> Utilisateur supprimé avec succès !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(isset($_GET['error']) && $_GET['error'] == 'self_action'): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> ⚠️ Vous ne pouvez pas supprimer votre propre compte !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        <div style="margin-bottom: 1rem; text-align: right;">
                            <a href="ajout_admin.php" style="background: #3b82f6; border: none; color: white; padding: 8px 20px; border-radius: 40px; font-weight: 500; font-size: 0.85rem; text-decoration: none; display: inline-block;">
                                <i class="bi bi-plus-circle"></i> Ajouter un utilisateur
                            </a>
                        </div>
                        
                        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div style="padding: 1rem 1.2rem; border-bottom: 1px solid #eef2ff;">
                                <h4 style="margin: 0; font-size: 1rem; font-weight: 600; color: #0f172a;">Liste des utilisateurs</h4>
                            </div>
                            <div class="table-responsive-fix" style="overflow-x: visible !important;">
                                <?php
                                try {
                                    $sql = "SELECT user_id, first_name, last_name, email, telephone, is_active, role, date_creation 
                                            FROM Users 
                                            ORDER BY user_id DESC";
                                    
                                    $resultat = $conn->query($sql);
                                    
                                    if ($resultat && $resultat->num_rows > 0) {
                                        echo '<table class="table table-hover" style="width: 100%; margin-bottom: 0; table-layout: fixed;">';
                                        echo '<thead>';
                                        echo '<tr style="background: #f8f9fa;">';
                                        echo '  <th style="padding: 12px 8px; text-align: center;">ID</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: left;">Prénom</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: left;">Nom</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: left;">Email</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: center;">Téléphone</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: center;">Rôle</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: center;">Statut</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: center;">Date création</th>';
                                        echo '  <th style="padding: 12px 8px; text-align: center;">Actions</th>';
                                        echo '</thead>';
                                        echo '<tbody>';
                                        
                                        while ($row = $resultat->fetch_assoc()) {
                                            $user_id = intval($row["user_id"]);
                                            $first_name = htmlspecialchars($row["first_name"]);
                                            $last_name = htmlspecialchars($row["last_name"]);
                                            $full_name = $first_name . ' ' . $last_name;
                                            $email = htmlspecialchars($row["email"]);
                                            $telephone = !empty($row["telephone"]) ? htmlspecialchars($row["telephone"]) : '—';
                                            $date_created = date('d/m/Y', strtotime($row["date_creation"]));
                                            $role = $row['role'] ?? 'etudiant';
                                            
                                            $role_badge = '';
                                            if($role == 'admin'){
                                                $role_badge = '<span class="badge" style="background: #10b981; color: white;">Admin</span>';
                                            } elseif($role == 'responsable'){
                                                $role_badge = '<span class="badge" style="background: #10b981; color: white;">Responsable</span>';
                                            } else {
                                                $role_badge = '<span class="badge" style="background: #10b981; color: white;">Étudiant</span>';
                                            }
                                            
                                          
                                            echo '<td style="padding: 14px 8px; text-align: center; vertical-align: middle;">' . $user_id . '';
                                            echo '<td style="padding: 14px 8px; vertical-align: middle;">' . $first_name . '';
                                            echo '<td style="padding: 14px 8px; vertical-align: middle;">' . $last_name . '';
                                            echo '<td style="padding: 14px 8px; vertical-align: middle; word-break: break-all;">' . $email . '';
                                            echo '<td style="padding: 14px 8px; text-align: center; vertical-align: middle;">' . $telephone . '';
                                            echo '<td style="padding: 14px 8px; text-align: center; vertical-align: middle;">' . $role_badge . '';
                                            echo '<td style="padding: 14px 8px; text-align: center; vertical-align: middle;">';
                                            
                                            if($row["is_active"] == 1) {
                                                echo '<span class="badge bg-success">Actif</span>';
                                            } else {
                                                echo '<span class="badge bg-danger">Inactif</span>';
                                            }
                                            
                                            echo '<td style="padding: 14px 8px; text-align: center; vertical-align: middle;">' . $date_created . '';
                                            echo '<td style="padding: 14px 8px; text-align: center; vertical-align: middle;">';
                                            echo '<div class="btn-group" role="group">';
                                            
                                            if($user_id != $_SESSION['user_id']) {
                                                echo '<button type="button" class="btn btn-sm btn-outline-danger" title="Supprimer" onclick="confirmDelete(' . $user_id . ', \'' . addslashes($full_name) . '\')"><i class="bi bi-trash"></i></button>';
                                            } else {
                                                echo '<span class="badge bg-secondary">Vous-même</span>';
                                            }
                                            
                                            echo '</div>';
                                            echo '</tr>';
                                        }
                                        
                                        echo '</tbody>';
                                        echo '</table>';
                                    } else {
                                        echo '<div style="text-align: center; padding: 3rem;">';
                                        echo '<i class="bi bi-people" style="font-size: 2.5rem; color: #cbd5e1;"></i>';
                                        echo '<p style="color: #94a3b8; margin-top: 0.5rem;">Aucun utilisateur trouvé</p>';
                                        echo '<a href="ajout_admin.php" class="btn btn-primary mt-3">Ajouter un utilisateur</a>';
                                        echo '</div>';
                                    }
                                } catch (Exception $e) {
                                    echo '<div class="alert alert-danger m-3">';
                                    echo '<i class="bi bi-exclamation-triangle-fill me-2"></i>';
                                    echo 'Erreur : ' . htmlspecialchars($e->getMessage());
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
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <p class="mt-3 mb-0" id="modalSuppressionMessage">Voulez-vous vraiment supprimer cet utilisateur ?</p>
                    <small class="text-muted">Cette action est irréversible.</small>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0 pb-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Annuler</button>
                    <a href="#" id="btnConfirmSupprimer" class="btn btn-danger px-4">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function confirmDelete(userId, userName) {
            var modal = document.getElementById('modalConfirmationSuppression');
            var btnConfirmer = document.getElementById('btnConfirmSupprimer');
            var message = document.getElementById('modalSuppressionMessage');
            
            btnConfirmer.href = '../../traitement/traitement_admin.php?action=delete&user_id=' + userId;
            message.innerHTML = 'Voulez-vous vraiment supprimer l\'utilisateur <strong>' + userName + '</strong> ?';
            
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        }
    </script>
</body>
</html>