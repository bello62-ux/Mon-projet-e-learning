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
        // Vérifier si l'admin a des utilisateurs associés
        $check_sql = "SELECT COUNT(*) as count FROM Users WHERE classroom_id IN 
                     (SELECT classroom_id FROM Users WHERE user_id = ?) AND is_admin = 0";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("i", $user_id);
        $check_stmt->execute();
        $result = $check_stmt->get_result();
        $user_count = $result->fetch_assoc()['count'];
        
        if($user_count > 0){
            header("Location: ../admin/liste/liste_admin.php?error=has_users&count=" . $user_count);
            exit();
        }
        
        // Supprimer l'administrateur
        $sql = "DELETE FROM Users WHERE user_id = ? AND is_admin = 1";
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