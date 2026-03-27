<?php
// Démarrer la session si elle n'est pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Définir le titre de la page si non défini
$page_title = isset($page_title) ? $page_title : "Cours - Plateforme Éducative";

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);

// Récupérer le nom de l'utilisateur (gère les deux clés possibles)
$user_name = '';
if ($is_logged_in) {
    // Vérifier si la session contient user_first_name ou first_name
    if (isset($_SESSION['user_first_name'])) {
        $user_name = $_SESSION['user_first_name'];
    } elseif (isset($_SESSION['first_name'])) {
        $user_name = $_SESSION['first_name'];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/layout.css">
    <title><?php echo $page_title; ?></title>
</head>
<body>
    <header>
        <div class="header-container">
            <!-- Bouton hamburger (visible sur mobile) -->
            <button class="mobile-menu-btn" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- Logo -->
            <img src="../../../../media/images/logo.png" alt="Logo Nournours" id="nournours">

            <!-- Navigation principale -->
            <nav class="main-nav">
                <ul>
                    <a href="../index.php"><li>Accueil</li></a>
                    <a href="../user/cours.php"><li>Cours</li></a>
                    <a href="../user/abonnement.php"><li>Abonnement</li></a>

                    <!-- Menu Profil : visible uniquement si connecté -->
                    <?php if ($is_logged_in && !empty($user_name)): ?>
                        <a href="../user/profil.php"><li>Profil (<?php echo htmlspecialchars($user_name); ?>)</li></a>
                    <?php elseif ($is_logged_in): ?>
                        <a href="../user/profil.php"><li>Mon Profil</li></a>
                    <?php endif; ?>
                    
                    <a href="../user/apropos.php"><li>A propos</li></a>
                    <a href="../user/contact.php"><li>Contact</li></a>
                    
                    <!-- Connexion / Déconnexion selon l'état -->
                    <?php if ($is_logged_in): ?>
                      
                    <?php else: ?>
                        <a href="../authentification/login.php"><li>Connexion</li></a>
                        <a href="../authentification/register.php"><li>Inscription</li></a>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        // Gestion du menu hamburger
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.querySelector('.mobile-menu-btn');
            const mainNav = document.querySelector('.main-nav');

            if (menuBtn && mainNav) {
                menuBtn.addEventListener('click', function() {
                    mainNav.classList.toggle('active');
                    menuBtn.classList.toggle('active');
                });

                // Fermer le menu en cliquant à l'extérieur (sur mobile)
                document.addEventListener('click', function(event) {
                    if (window.innerWidth <= 768 && 
                        mainNav.classList.contains('active') && 
                        !mainNav.contains(event.target) && 
                        !menuBtn.contains(event.target)) {
                        mainNav.classList.remove('active');
                        menuBtn.classList.remove('active');
                    }
                });
            }
        });
    </script>
</body>