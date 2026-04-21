<?php
session_start();

// Récupérer les messages de la session
$connexion_success = isset($_SESSION['connexion_success']) ? $_SESSION['connexion_success'] : false;
$connexion_error = isset($_SESSION['connexion_error']) ? $_SESSION['connexion_error'] : "";
$user_first_name = isset($_SESSION['user_first_name']) ? $_SESSION['user_first_name'] : "";

// Nettoyer les messages de la session après les avoir récupérés
unset($_SESSION['connexion_success']);
unset($_SESSION['connexion_error']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/login.css">
    <title>Connexion - Plateforme Éducative</title>
    <style>
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            border-left: 4px solid #ef4444;
        }
        .alert-warning {
            background: #fef3c7;
            color: #92400e;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            border-left: 4px solid #f59e0b;
        }
    </style>
</head>
<body>
    <?php if ($connexion_success): ?>
    <div class="overlay"></div>
    <div class="success-popup">
        <div class="success-icon">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" fill="#2ecc71"/>
            </svg>
        </div>
        <div class="success-message">✅ Connexion réussie !</div>
        <p>Bienvenue <?php echo htmlspecialchars($user_first_name); ?> !</p>
    </div>
    <script>
        setTimeout(function() {
            <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                window.location.href = "../admin/layout/dashboard.php";
            <?php else: ?>
                window.location.href = "../index.php";
            <?php endif; ?>
        }, 2000);
    </script>
    <?php endif; ?>

    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h1>Connexion</h1>
                <p>Accédez à votre espace d'apprentissage</p>
            </div>
            
            <?php if (!empty($connexion_error)): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($connexion_error); ?></div>
            <?php endif; ?>
            
            <?php if(isset($_GET['error'])): ?>
                <?php if($_GET['error'] == 'blocked'): ?>
                    <div class="alert alert-error">
                        <strong>Compte bloqué !</strong> Votre compte a été bloqué par un administrateur.Contactez nous au <a href="https://wa.me/2290162130248" target="_blank" class="btn-whatsapp"><i class="fab fa-whatsapp"></i>ici </a>pour connaitre les raisons
                    </div>
                <?php elseif($_GET['error'] == 'deleted'): ?>
                    <div class="alert alert-error">
                        <strong>Compte supprimé !</strong> Votre compte a été supprimé.Contactez nous au <a href="https://wa.me/2290162130248" target="_blank" class="btn-whatsapp"><i class="fab fa-whatsapp"></i>ici </a>pour connaitre les raisons
                    </div>
                <?php elseif($_GET['error'] == 'invalid'): ?>
                    <div class="alert alert-error">
                        <strong>Erreur de connexion</strong> Mot de passe incorrect.
                    </div>
                <?php elseif($_GET['error'] == 'notfound'): ?>
                    <div class="alert alert-error">
                        <strong>Compte introuvable</strong> Aucun compte associé à cet email.
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
            <form method="POST" action="../process/login_process.php" class="login-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="votre@email.com" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="password-input-wrapper">
                        <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember_me" id="remember_me">
                        <span>Se souvenir de moi</span>
                    </label>
                    
                    <a href="forgot-password.php" class="forgot-password">Mot de passe oublié ?</a>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </form>

            <div class="form-footer">
                <p>Pas encore de compte ? <a href="register.php">Inscrivez-vous</a></p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        }

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                if (this.value) {
                    this.classList.add('filled');
                } else {
                    this.classList.remove('filled');
                }
            });
        });

        console.log("Page login.php chargée");
        <?php if ($connexion_success): ?>
        console.log("Succès de connexion détecté");
        <?php endif; ?>
    </script>
</body>
</html>