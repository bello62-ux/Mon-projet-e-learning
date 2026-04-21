<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['user_id'])){
    header("Location: ../authentification/login.php");
    exit();
}

// Vérifier si c'est un admin
if($_SESSION['is_admin'] != 1){
    header("Location: ../../index.php");
    exit();
}

$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Admin Éducation - Bootstrap</title>
   
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
                <h2>Tableau de bord pédagogique</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php" class="text-decoration-none">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>

            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body text-center py-5">
                                <i class="bi bi-megaphone fs-1 text-primary"></i>
                                <h4 class="mt-3">Bienvenue sur votre tableau de bord</h4>
                                <p class="text-muted">Sélectionnez une option dans le menu</p>
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