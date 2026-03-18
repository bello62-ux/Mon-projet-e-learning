<?php
include('../config/db.php');
session_start();

$connexion_error = "";
$connexion_success = false;

// Rediriger si déjà connecté
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Gestion de la connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Rechercher l'utilisateur par email
    $sql = "SELECT user_id, first_name, last_name, email, password, is_active, is_admin FROM Users WHERE email = ? AND is_active = 1";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Erreur de préparation de la requête: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $connexion_success = true;
        
        // Créer la session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_first_name'] = $user['first_name'];
        $_SESSION['user_last_name'] = $user['last_name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_is_admin'] = $user['is_admin'];
        
        // Gérer "Se souvenir de moi"
        if ($remember_me) {
            $token = bin2hex(random_bytes(32));
            $expiry = time() + (30 * 24 * 60 * 60); // 30 jours
            
            // Sauvegarder le token dans la base de données
            $token_stmt = $conn->prepare("UPDATE Users SET remember_token = ? WHERE user_id = ?");
            $token_stmt->bind_param("si", $token, $user['user_id']);
            $token_stmt->execute();
            $token_stmt->close();
            
            // Créer le cookie
            setcookie('remember_token', $token, $expiry, '/', '', false, true);
        }
        
    } else {
        $connexion_error = "Email ou mot de passe incorrect!";
        
        // Vérifier si le compte existe mais est inactif
        if (!$user && $stmt->affected_rows > 0) {
            $connexion_error = "Votre compte est désactivé. Veuillez contacter l'administrateur.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>