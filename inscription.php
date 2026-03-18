<?php
include('db.php');
session_start();

$inscription_error = "";
$inscription_success = false;
$connexion_error = "";
$connexion_success = false;

// Gestion de l'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $niveau_scolaire = $_POST['level'] ?? '';

    if ($mot_de_passe !== $confirm_password) {
        $inscription_error = "❌ Les mots de passe ne correspondent pas.";
    } else {
        // Vérifier d'abord si l'email existe déjà
        $check_stmt = $conn->prepare("SELECT id FROM utilisateurs WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();
        
        if ($check_stmt->num_rows > 0) {
            $inscription_error = "❌ Cet email est déjà utilisé. Veuillez utiliser un autre email.";
            $check_stmt->close();
        } else {
            $check_stmt->close();
            
            $password_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe, niveau_scolaire) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nom, $email, $password_hash, $niveau_scolaire);

            if ($stmt->execute()) {
                $inscription_success = true;
            } else {
                $inscription_error = "❌ Erreur lors de l'inscription: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

// Gestion de la connexion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM utilisateurs WHERE nom = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête: " . $conn->error);
    }

    $stmt->bind_param("s", $nom_utilisateur);
    $stmt->execute();

    $result = $stmt->get_result();
    $utilisateur = $result->fetch_assoc();

    if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
        $connexion_success = true;
        $_SESSION['user_id'] = $utilisateur['id'];
        $_SESSION['user_nom'] = $utilisateur['nom'];
    } else {
        $connexion_error = "Nom d'utilisateur ou mot de passe incorrect!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page de Connexion / Inscription</title>
   
</head>
<body>
    <?php if ($inscription_success): ?>
    <div class="overlay"></div>
    <div class="success-popup">
        <div class="success-icon">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" fill="#2ecc71"/>
            </svg>
        </div>
        <div class="success-message">✅ Inscription réussie !</div>
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.overlay').style.display = 'none';
            document.querySelector('.success-popup').style.display = 'none';
            // Réinitialiser le formulaire après succès
            document.getElementById('nom').value = '';
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
            document.getElementById('confirm-password').value = '';
            document.getElementById('nom_utilisateur').value = '';
            document.getElementById('login-password').value = '';
            
            const radios = document.querySelectorAll('input[type="radio"]');
            radios.forEach(radio => radio.checked = false);
            
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                if (checkbox.id !== 'show-password' && checkbox.id !== 'remember-me') {
                    checkbox.checked = false;
                }
            });
        }, 3000);
    </script>
    <?php endif; ?>

    <?php if ($connexion_success): ?>
    <div class="overlay"></div>
    <div class="success-popup">
        <div class="success-icon">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" fill="#2ecc71"/>
            </svg>
        </div>
        <div class="success-message">✅ Connexion réussie !</div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "acceuil.html";
        }, 2000);
    </script>
    <?php endif; ?>

    <div id="bello">
        
        <section class="form-section" id="signup-section">
            <h2>CREER UN COMPTE</h2>
            
            <?php if (!empty($inscription_error)): ?>
                <div class="message error"><?php echo $inscription_error; ?></div>
            <?php endif; ?>
            
            <form method="POST" autocomplete="off">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre nom" required value="">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Votre email" required value="">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirmer le mot de passe</label>
                    <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirmez le mot de passe" required>
                </div>

                <div class="form-group">
                    <label>Niveau scolaire</label>
                    <div class="level-group">
                        <label><input type="radio" name="level" value="cm2" required> CM2</label>
                        <label><input type="radio" name="level" value="3eme"> 3ème</label>
                        <label><input type="radio" name="level" value="terminale"> Terminale</label>
                    </div>
                </div>

                <div class="form-group">
                    <label><input type="checkbox" name="terms" required> J'accepte les Conditions Générales d'utilisation</label>
                    <label><input type="checkbox" name="privacy" required> J'ai lu et j'accepte la politique de confidentialité</label>
                </div>

                <button class="btn2" id="signup-btn" type="submit" name="submit">S'inscrire</button>
            </form>
        </section>

        <div class="vertical-divider"></div>

        <aside class="form-section" id="login-section">
            <h2>SE CONNECTER</h2>
            
            <?php if (!empty($connexion_error)): ?>
                <div class="message error"><?php echo $connexion_error; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label for="text">Nom d'utilisateur</label>
                    <input type="text" id="nom_utilisateur" name="nom_utilisateur" placeholder="Votre nom d'utilisateur" required value="">
                </div>

                <div class="form-group">
                    <label for="login-password">Mot de passe</label>
                    <input type="password" id="login-password" name="mot_de_passe" placeholder="Votre mot de passe" required>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="show-password">
                    <label for="show-password">Voir le mot de passe</label>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Se souvenir de moi</label>
                </div>

                <button class="btn" id="login-btn" type="submit" name="login">Se connecter</button>
            </form>

            <a href=""><div class="note">[Mot de passe oublié ?]</div></a>
        </aside>
           
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showPasswordCheckbox = document.getElementById('show-password');
            const loginPassword = document.getElementById('login-password');
            showPasswordCheckbox.addEventListener('change', function() {
                loginPassword.type = this.checked ? 'text' : 'password';
            });

            // Réinitialiser tous les champs au chargement de la page
            document.getElementById('nom').value = '';
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
            document.getElementById('confirm-password').value = '';
            document.getElementById('nom_utilisateur').value = '';
            document.getElementById('login-password').value = '';
            
            // Décocher toutes les cases à cocher et boutons radio
            const radios = document.querySelectorAll('input[type="radio"]');
            radios.forEach(radio => radio.checked = false);
            
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                if (checkbox.id !== 'show-password' && checkbox.id !== 'remember-me') {
                    checkbox.checked = false;
                }
            });
        });
    </script>
</body>
</html>