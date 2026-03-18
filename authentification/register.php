<?php
session_start();
include('../config/db.php');

// Récupérer les messages de session
$inscription_error = $_SESSION['inscription_error'] ?? "";
$inscription_success = $_SESSION['inscription_success'] ?? false;

// Récupérer les anciennes données POST
$old_input = $_SESSION['post_data'] ?? [];

// Effacer les données après les avoir récupérées
unset($_SESSION['inscription_error']);
unset($_SESSION['inscription_success']);
unset($_SESSION['post_data']);

// Récupérer les classes
$classes = [];
$class_result = $conn->query("SELECT classroom_id, name FROM Classroom ORDER BY name");
if ($class_result) {
    while ($row = $class_result->fetch_assoc()) {
        $classes[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <title>Inscription - E-learning</title>
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
        <p>Vous pouvez maintenant vous connecter</p>
        <a href="login.php" class="btn btn-primary" style="margin-top: 20px; display: inline-block;">Se connecter</a>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "login.php";
        }, 3000);
    </script>
    <?php endif; ?>

    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h1>Créer un compte</h1>
                <p>Rejoignez notre plateforme d'apprentissage</p>
            </div>
            
            <?php if (!empty($inscription_error)): ?>
                <div class="alert alert-error"><?php echo $inscription_error; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="../process/register_process.php" autocomplete="off">
                <div class="form-row">
                    <div class="form-group">
                        <label>Prénom <span class="required">*</span></label>
                        <input type="text" name="first_name" placeholder="Votre prénom" required 
                               value="<?php echo isset($old_input['first_name']) ? htmlspecialchars($old_input['first_name']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label>Nom <span class="required">*</span></label>
                        <input type="text" name="last_name" placeholder="Votre nom" required
                               value="<?php echo isset($old_input['last_name']) ? htmlspecialchars($old_input['last_name']) : ''; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Email <span class="required">*</span></label>
                    <input type="email" name="email" placeholder="exemple@email.com" required
                           value="<?php echo isset($old_input['email']) ? htmlspecialchars($old_input['email']) : ''; ?>">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Mot de passe <span class="required">*</span></label>
                        <div class="password-input-wrapper">
                            <input type="password" name="password" id="password" placeholder="Min. 8 caractères" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Confirmer <span class="required">*</span></label>
                        <div class="password-input-wrapper">
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmez" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('confirm_password')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Date de naissance</label>
                        <input type="date" name="birthday"
                               value="<?php echo isset($old_input['birthday']) ? $old_input['birthday'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="tel" name="telephone" placeholder="+229 XX XX XX XX"
                               value="<?php echo isset($old_input['telephone']) ? htmlspecialchars($old_input['telephone']) : ''; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Classe</label>
                    <select name="classroom_id">
                        <option value="">Sélectionnez votre classe</option>
                        <?php foreach($classes as $class): ?>
                            <option value="<?= $class['classroom_id'] ?>" 
                                <?php echo (isset($old_input['classroom_id']) && $old_input['classroom_id'] == $class['classroom_id']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($class['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="terms-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="terms" required
                               <?php echo isset($old_input['terms']) ? 'checked' : ''; ?>>
                        J'accepte les Conditions Générales d'utilisation <span class="required">*</span>
                    </label>
                    
                    <label class="checkbox-label">
                        <input type="checkbox" name="privacy" required
                               <?php echo isset($old_input['privacy']) ? 'checked' : ''; ?>>
                        J'accepte la politique de confidentialité <span class="required">*</span>
                    </label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block">
                    S'inscrire
                </button>
            </form>

            <div class="form-footer">
                <p>Déjà inscrit ? <a href="login.php">Connectez-vous</a></p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.type === 'password' ? 'text' : 'password';
            field.type = type;
        }
    </script>
</body>
</html>