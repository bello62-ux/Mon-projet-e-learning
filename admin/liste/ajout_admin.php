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

$error = '';
$success = '';

// Traitement du formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $telephone = trim($_POST['telephone'] ?? '');
    $birthday = $_POST['birthday'] ?? '';
    $role = $_POST['role'] ?? 'etudiant';
    
    // Validation
    if(empty($first_name) || empty($last_name) || empty($email) || empty($password)){
        $error = "Tous les champs obligatoires doivent être remplis.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "L'adresse email n'est pas valide.";
    } elseif(strlen($password) < 6){
        $error = "Le mot de passe doit contenir au moins 6 caractères.";
    } elseif($password !== $confirm_password){
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        try {
            // Vérifier si l'email existe déjà
            $check_sql = "SELECT user_id FROM Users WHERE email = ?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param("s", $email);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            
            if($check_result->num_rows > 0){
                $error = "Cet email est déjà utilisé.";
            } else {
                // Hash du mot de passe
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Déterminer is_admin en fonction du rôle
                $is_admin = ($role == 'admin') ? 1 : 0;
                
                // Insérer le nouvel utilisateur
                $sql = "INSERT INTO Users (first_name, last_name, email, password, telephone, birthday, is_admin, is_active, role, date_creation) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, 1, ?, NOW())";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssis", $first_name, $last_name, $email, $hashed_password, $telephone, $birthday, $is_admin, $role);
                
                if($stmt->execute()){
                    $success = "Utilisateur ajouté avec succès !";
                    // Réinitialiser le formulaire
                    $first_name = $last_name = $email = $telephone = $birthday = '';
                } else {
                    $error = "Erreur lors de l'ajout de l'utilisateur.";
                }
            }
        } catch (Exception $e) {
            $error = "Une erreur est survenue : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur - Admin</title>
    
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
                                <li><a href="liste_admin.php" style="color: #6c757d; text-decoration: none; font-size: 1rem; font-weight: 500;">Utilisateurs</a> <span style="color: #adb5bd;">/</span></li>
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;">Ajouter un utilisateur</span></li>
                            </ol>
                        </nav>
                        
                        <div style="margin-bottom: 1.5rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Ajouter un utilisateur</h2>
                            <p class="text-muted mt-1">Créez un nouveau compte sur la plateforme</p>
                        </div>
                        
                        <?php if($error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo htmlspecialchars($error); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($success): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> <?php echo htmlspecialchars($success); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        <div style="background: white; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); padding: 1.5rem;">
                            <div style="background: #fef3c7; color: #92400e; padding: 0.5rem 1rem; border-radius: 10px; font-size: 0.85rem; margin-bottom: 1.5rem;">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                Choisissez le rôle de l'utilisateur. Les responsables peuvent gérer les cours, les administrateurs ont un accès total.
                            </div>
    
                            <form method="POST" action="" id="adminForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="first_name" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Prénom <span style="color: #ef4444;">*</span></label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" 
                                        value="<?php echo htmlspecialchars($first_name ?? ''); ?>" 
                                        style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                    </div>
            
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Nom <span style="color: #ef4444;">*</span></label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" 
                                        value="<?php echo htmlspecialchars($last_name ?? ''); ?>" 
                                        style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Adresse email <span style="color: #ef4444;">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                        value="<?php echo htmlspecialchars($email ?? ''); ?>" 
                                        style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                    </div>
            
                                    <div class="col-md-6 mb-3">
                                        <label for="telephone" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Téléphone</label>
                                        <input type="tel" class="form-control" id="telephone" name="telephone" 
                                        value="<?php echo htmlspecialchars($telephone ?? ''); ?>" 
                                        style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;">
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="birthday" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Date de naissance</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday" 
                                        value="<?php echo htmlspecialchars($birthday ?? ''); ?>" 
                                        style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;">
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="role" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Rôle <span style="color: #ef4444;">*</span></label>
                                        <select name="role" id="role" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                            <option value="etudiant" <?php echo (isset($role) && $role == 'etudiant') ? 'selected' : ''; ?>>Étudiant</option>
                                            <option value="responsable" <?php echo (isset($role) && $role == 'responsable') ? 'selected' : ''; ?>>Responsable</option>
                                            <option value="admin" <?php echo (isset($role) && $role == 'admin') ? 'selected' : ''; ?>>Administrateur</option>
                                        </select>
                                        <small style="color: #6c757d;">Le rôle détermine les droits de l'utilisateur.</small>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="password" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Mot de passe <span style="color: #ef4444;">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" 
                                        style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                        <small class="text-muted">Minimum 6 caractères</small>
                                    </div>
            
                                    <div class="col-md-6 mb-3">
                                        <label for="confirm_password" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Confirmer le mot de passe <span style="color: #ef4444;">*</span></label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                                        style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                    </div>
                                </div>
        
                                <div style="display: flex; justify-content: flex-end; gap: 12px;">
                                    <a href="liste_admin.php" style="background: transparent; border: 1px solid #cbd5e1; padding: 0.6rem 1.5rem; border-radius: 10px; color: #475569; font-weight: 500; text-decoration: none;">
                                        Retour à la liste
                                    </a>
                                    <button type="submit" style="background: #3b82f6; border: none; padding: 0.6rem 1.5rem; border-radius: 10px; font-weight: 500; color: white; cursor: pointer;">
                                        Ajouter l'utilisateur
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../asset/js/ajout_admin.js"></script>
</body>
</html>