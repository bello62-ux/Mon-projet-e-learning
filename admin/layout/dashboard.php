<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['user_id'])){
    header("Location: ../authentification/login.php");
    exit();
}

// Vérifier le rôle
$user_role = $_SESSION['role'] ?? 'etudiant';
if($user_role != 'admin' && $user_role != 'responsable'){
    header("Location: ../../index.php");
    exit();
}

$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";
$is_admin = ($user_role == 'admin');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo ucfirst($user_role); ?></title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../asset/css/dashboard.css">
</head>
<body>
    <div class="wrapper">
        
        <?php include 'sidebar.php'; ?>

        <div id="content">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn-toggle">
                        <i class="bi bi-list"></i>
                    </button>
                    
                    <div class="ms-auto d-flex align-items-center">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control border-start-0" placeholder="Rechercher...">
                        </div>
                    </div>
                </div>
            </nav>

            <div class="page-title">
                <h2>Tableau de bord <?php echo ($is_admin) ? 'Administrateur' : 'Responsable'; ?></h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php" class="text-decoration-none">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <!-- Carte pour les cours (visible pour tous) -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-book fs-1 text-primary"></i>
                                <h5 class="mt-3">Gestion des cours</h5>
                                <p class="text-muted">Ajouter, modifier ou supprimer des cours</p>
                                <a href="../cours/ajouter_lecon.php" class="btn btn-primary btn-sm">Accéder</a>
                            </div>
                        </div>
                    </div>

                    <!-- Carte pour les utilisateurs (visible SEULEMENT pour admin) -->
                    <?php if ($is_admin): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-people fs-1 text-success"></i>
                                    <h5 class="mt-3">Gestion des utilisateurs</h5>
                                    <p class="text-muted">Gérer les étudiants et leurs comptes</p>
                                    <a href="../liste/liste_utilisateur.php" class="btn btn-success btn-sm" style="margin-top: 20px;">Accéder</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card shadow h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-shield-lock fs-1 text-danger"></i>
                                    <h5 class="mt-3">Administrateurs</h5>
                                    <p class="text-muted">Gérer les administrateurs et responsables</p>
                                    <a href="../liste/liste_admin.php" class="btn btn-danger btn-sm">Accéder</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

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