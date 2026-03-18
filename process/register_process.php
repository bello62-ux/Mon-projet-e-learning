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
    
    if ($password !== $confirm_password) {
        $inscription_error = "❌ Les mots de passe ne correspondent pas.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $inscription_error = "❌ Format d'email invalide.";
    } else {
        // Vérifier si l'email existe déjà
        $check_stmt = $conn->prepare("SELECT user_id FROM Users WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();
        
        if ($check_stmt->num_rows > 0) {
            $inscription_error = "❌ Cet email est déjà utilisé.";
            $check_stmt->close();
        } else {
            $check_stmt->close();
            
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $is_admin = 0;
            $is_active = 1;
            
            $stmt = $conn->prepare("INSERT INTO Users 
                (first_name, last_name, email, password, birthday, telephone, classroom_id, is_admin, is_active, date_creation) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            
            $stmt->bind_param("ssssssiii", 
                $first_name, 
                $last_name, 
                $email, 
                $password_hash, 
                $birthday, 
                $telephone, 
                $classroom_id,
                $is_admin,
                $is_active
            );

            if ($stmt->execute()) {
                $inscription_success = true;
            } else {
                $inscription_error = "❌ Erreur lors de l'inscription: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

// 🔥 Stocker les messages en session
$_SESSION['inscription_error'] = $inscription_error;
$_SESSION['inscription_success'] = $inscription_success;

// 🔥 Rediriger vers la page d'inscription
header('Location: ../authentification/register.php');
exit;
?>