<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/login.css">
    <title>Connexion - Plateforme Éducative</title>
</head>
<body>
    <?php
    // Récupérer les messages de la session
    session_start();
    $connexion_success = isset($_SESSION['connexion_success']) ? $_SESSION['connexion_success'] : false;
    $connexion_error = isset($_SESSION['connexion_error']) ? $_SESSION['connexion_error'] : "";
    $user_first_name = isset($_SESSION['user_first_name']) ? $_SESSION['user_first_name'] : "";
    
    // Nettoyer les messages de la session après les avoir récupérés
    unset($_SESSION['connexion_success']);
    unset($_SESSION['connexion_error']);
    ?>

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
            window.location.href = "index.php";
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
            
            <!-- IMPORTANT: Le formulaire pointe maintenant vers login_process.php -->
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

        // Ajouter la classe 'filled' aux inputs quand ils ont du contenu
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                if (this.value) {
                    this.classList.add('filled');
                } else {
                    this.classList.remove('filled');
                }
            });
        });
    </script>
</body>
</html>