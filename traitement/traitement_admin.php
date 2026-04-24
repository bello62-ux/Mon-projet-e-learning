<?php
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1){
    header("Location: ../authentification/login.php");
    exit();
}

require_once '../config/db.php';

if(!isset($_GET['action']) || !isset($_GET['user_id'])){
    header("Location: ../admin/liste/liste_admin.php?error=missing_params");
    exit();
}

$action = $_GET['action'];
$user_id = intval($_GET['user_id']);

if($user_id == $_SESSION['user_id']){
    header("Location: ../admin/liste/liste_admin.php?error=self_action");
    exit();
}

try {
    if($action == 'delete'){
        // Supprimer l'utilisateur
        $sql = "DELETE FROM Users WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        
        if($stmt->execute()){
            header("Location: ../admin/liste/liste_admin.php?success=deleted");
        } else {
            header("Location: ../admin/liste/liste_admin.php?error=db_error");
        }
    } else {
        header("Location: ../admin/liste/liste_admin.php?error=invalid_action");
    }
} catch (Exception $e) {
    header("Location: ../admin/liste/liste_admin.php?error=exception");
    exit();
}

$conn->close();
?>