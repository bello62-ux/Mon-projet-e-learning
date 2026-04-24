<?php
include('../config/db.php');
session_start();

$inscription_error = "";
$inscription_success = false;

// Gestion de l'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $birthday = $_POST['birthday'];
    $telephone = trim($_POST['telephone']);
    $classroom_id = $_POST['classroom_id'] ?? null;
    
    // ✅ Vérification : mots de passe correspondent
    if ($password !== $confirm_password) {
        $inscription_error = "❌ Les mots de passe ne correspondent pas.";
        $_SESSION['post_data'] = $_POST;
        $_SESSION['inscription_error'] = $inscription_error;
        header('Location: ../authentification/register.php');
        exit;
    }
    
    // ✅ Vérification : mot de passe >= 8 caractères
    elseif (strlen($password) < 8) {
        $inscription_error = "❌ Le mot de passe doit contenir au moins 8 caractères.";
        $_SESSION['post_data'] = $_POST;
        $_SESSION['inscription_error'] = $inscription_error;
        header('Location: ../authentification/register.php');
        exit;
    }
    
    // ✅ Vérification : email valide
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $inscription_error = "❌ Format d'email invalide.";
        $_SESSION['post_data'] = $_POST;
        $_SESSION['inscription_error'] = $inscription_error;
        header('Location: ../authentification/register.php');
        exit;
    }
    
    // ✅ Vérification : email déjà utilisé
    $check_stmt = $conn->prepare("SELECT user_id FROM Users WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();
    
    if ($check_stmt->num_rows > 0) {
        $inscription_error = "❌ Cet email est déjà utilisé.";
        $_SESSION['post_data'] = $_POST;
        $_SESSION['inscription_error'] = $inscription_error;
        header('Location: ../authentification/register.php');
        exit;
    }
    $check_stmt->close();
    
    // ✅ Tout est bon : on insère
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $is_admin = 0;
    $is_active = 1;
    $role = 'etudiant';  // ← AJOUT : rôle par défaut pour les inscriptions publiques
    
    $stmt = $conn->prepare("INSERT INTO Users 
        (first_name, last_name, email, password, birthday, telephone, classroom_id, is_admin, role, is_active, date_creation) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    
    $stmt->bind_param("sssssssisis", 
        $first_name, 
        $last_name, 
        $email, 
        $password_hash, 
        $birthday, 
        $telephone, 
        $classroom_id,
        $is_admin,
        $role,
        $is_active
    );

    if ($stmt->execute()) {
        $inscription_success = true;
    } else {
        $inscription_error = "❌ Erreur lors de l'inscription: " . $stmt->error;
    }
    $stmt->close();
}

// ✅ Stocker les résultats en session
$_SESSION['inscription_error'] = $inscription_error;
$_SESSION['inscription_success'] = $inscription_success;

// ✅ Si succès, on ne garde pas les données POST
if ($inscription_success) {
    unset($_SESSION['post_data']);
} else {
    $_SESSION['post_data'] = $_POST;
}

// ✅ Redirection
header('Location: ../authentification/register.php');
exit;
?>