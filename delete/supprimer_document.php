<?php
session_start();
require_once '../config/db.php';

// Vérifier si l'admin est connecté
if(!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1){
    header("Location: ../authentification/login.php");
    exit();
}

// Vérifier si l'ID du document est présent
if(isset($_GET['document_id'])){
    $document_id = $_GET['document_id'];
    
    // Récupérer le chemin du fichier pour le supprimer du dossier
    $sql_file = "SELECT chemin_document, photo FROM Document WHERE document_id = ?";
    $stmt_file = $conn->prepare($sql_file);
    $stmt_file->bind_param("i", $document_id);
    $stmt_file->execute();
    $result_file = $stmt_file->get_result();
    $file_data = $result_file->fetch_assoc();
    
    // Supprimer le fichier du dossier s'il existe
    if(!empty($file_data['chemin_document'])) {
        $file_path = "../" . $file_data['chemin_document'];
        if(file_exists($file_path)) {
            unlink($file_path);
        }
    }
    
    // Supprimer la photo de couverture du dossier si elle existe
    if(!empty($file_data['photo'])) {
        $photo_path = "../" . $file_data['photo'];
        if(file_exists($photo_path)) {
            unlink($photo_path);
        }
    }
    
    // Supprimer le document de la base de données
    $sql = "DELETE FROM Document WHERE document_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $document_id);
    
    if($stmt->execute()){
        header("Location: ../admin/cours/ajout_document.php?delete=1");
        exit();
    } else {
        header("Location: ../admin/cours/ajout_document.php?error=delete_failed");
        exit();
    }
    
    $stmt->close();
    $conn->close();
    
} else {
    header("Location: ../admin/cours/ajout_document.php");
    exit();
}
?>