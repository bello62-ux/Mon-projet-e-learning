<?php
include('../config/db.php');
session_start();

$connexion_error = "";
$connexion_success = false;

// Rediriger si déjà connecté
if (isset($_SESSION['user_id'])) {
    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
        header("Location: ../admin/layout/dashboard.php");
    } else {
        header("Location: ../index.php");
    }
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

    // NE PAS filtrer sur is_active = 1 ici pour pouvoir détecter les comptes bloqués
    $sql = "SELECT user_id, first_name, last_name, email, password, is_active, is_admin FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Erreur de préparation de la requête: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Cas 1 : L'utilisateur n'existe pas du tout (compte supprimé)
    if (!$user) {
        $_SESSION['connexion_error'] = "Compte supprimé";
        header("Location: ../authentification/login.php?error=deleted");
        exit();
    }

    // Cas 2 : Le compte existe mais est bloqué (is_active = 0)
    if ($user && $user['is_active'] == 0) {
        $_SESSION['connexion_error'] = "Compte bloqué";
        header("Location: ../authentification/login.php?error=blocked");
        exit();
    }

    // Cas 3 : Vérification du mot de passe pour compte actif
    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie - créer la session utilisateur
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['is_admin'] = $user['is_admin'];
        $_SESSION['connexion_success'] = true;
        
        // Pour la sidebar admin
        $_SESSION['admin_nom'] = $user['first_name'] . ' ' . $user['last_name'];
        $_SESSION['admin_email'] = $user['email'];

        // Gérer "Se souvenir de moi"
        if ($remember_me) {
            $token = bin2hex(random_bytes(32));
            $expiry = time() + (30 * 24 * 60 * 60);
            setcookie('remember_token', $token, $expiry, '/', '', false, true);
        }
        
        $stmt->close();
        $conn->close();
        
        header("Location: ../authentification/login.php");
        exit();
        
    } else {
        // Cas 4 : Mot de passe incorrect
        $connexion_error = "Email ou mot de passe incorrect!";
        $_SESSION['connexion_error'] = $connexion_error;
        
        $stmt->close();
        $conn->close();
        
        header("Location: ../authentification/login.php?error=invalid");
        exit();
    }
}
?>