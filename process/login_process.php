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
        // Connexion réussie - créer la session utilisateur
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['is_admin'] = $user['is_admin'];
        $_SESSION['connexion_success'] = true;
        
        // Gérer "Se souvenir de moi"
        if ($remember_me) {
            $token = bin2hex(random_bytes(32));
            $expiry = time() + (30 * 24 * 60 * 60); // 30 jours
            
            
            setcookie('remember_token', $token, $expiry, '/', '', false, true);
        }
        
        $stmt->close();
        $conn->close();
        
        // Rediriger vers la page de connexion pour afficher le message de succès
        header("Location: ../authentification/login.php");
        exit();
        
    } else {
        $connexion_error = "Email ou mot de passe incorrect!";
        $_SESSION['connexion_error'] = $connexion_error;
        
        $stmt->close();
        $conn->close();
        
        // Rediriger vers la page de connexion pour afficher le message d'erreur
        header("Location: ../authentification/login.php");
        exit();
    }
}
?>