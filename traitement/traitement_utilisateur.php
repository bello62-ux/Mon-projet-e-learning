<?php
session_start();

// Vérifier si l'utilisateur est admin
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    header("Location: ../admin/layout/dashboard.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "cotonou");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['action']) && isset($_GET['user_id'])){
    $action = $_GET['action'];
    $user_id = $_GET['user_id'];
    
    // Empêcher de se modifier soi-même
    if($user_id == $_SESSION['user_id']){
        header("Location: ../admin/liste/liste_utilisateur.php?error=self_action");
        exit();
    }
    
    $user_id = $conn->real_escape_string($user_id);
    
    switch($action){
        case 'block':
            // Bloquer l'utilisateur
            $sql = "UPDATE Users SET is_active = 0 WHERE user_id = '$user_id' AND is_admin = 0";
            if($conn->query($sql)){
                header("Location: ../admin/liste/liste_utilisateur.php?success=blocked");
                exit();
            }
            break;
            
        case 'unblock':
            // Débloquer l'utilisateur
            $sql = "UPDATE Users SET is_active = 1 WHERE user_id = '$user_id' AND is_admin = 0";
            if($conn->query($sql)){
                header("Location: ../admin/liste/liste_utilisateur.php?success=unblocked");
                exit();
            }
            break;
            
        case 'delete':
            // Supprimer l'utilisateur
            $sql = "DELETE FROM Users WHERE user_id = '$user_id' AND is_admin = 0";
            if($conn->query($sql)){
                header("Location: ../admin/liste/liste_utilisateur.php?success=deleted");
                exit();
            }
            break;
    }
    
    header("Location: ../admin/liste/liste_utilisateur.php?error=unknown");
    exit();
    
} else {
    header("Location: ../admin/liste/liste_utilisateur.php");
    exit();
}

$conn->close();
?>