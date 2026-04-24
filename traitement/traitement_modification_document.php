<?php
session_start();
require_once '../config/db.php';

// Vérifier si l'admin est connecté
if(!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1){
    header("Location: ../authentification/login.php");
    exit();
}

if(isset($_POST["modifier"])) {
    
    // Récupération des données du formulaire
    $document_id = $_POST['document_id'];
    $typedocument_id = $_POST['typedocument_id'];
    $classroom_id = $_POST['classroom_id'];
    $subject_id = $_POST['subject_id'];
    $nom_document = trim($_POST['nom_document']);
    $auteur_document = trim($_POST['auteur_document']) ?? '';
    $annee = !empty($_POST['annee']) ? intval($_POST['annee']) : 0;
    $nbre_page = !empty($_POST['nbre_page']) ? intval($_POST['nbre_page']) : 0;
    $prix = !empty($_POST['prix']) ? floatval($_POST['prix']) : 0;  // ← NOUVEAU
    $description_document = trim($_POST['description_document']) ?? '';
    $active = $_POST['active'] ?? 1;
    
    // Configuration des dossiers d'upload
    $upload_dir_doc = "D:/Sites/Lab/Mon-projet-e-learning/PROJET SOUTENANCE/uploads/documents/";
    $upload_dir_photo = "D:/Sites/Lab/Mon-projet-e-learning/PROJET SOUTENANCE/uploads/document_photos/";
    
    if(!is_dir($upload_dir_doc)) mkdir($upload_dir_doc, 0777, true);
    if(!is_dir($upload_dir_photo)) mkdir($upload_dir_photo, 0777, true);
    
    // Récupérer les infos actuelles du document
    $sql_current = "SELECT chemin_document, photo FROM Document WHERE document_id = ?";
    $stmt_current = $conn->prepare($sql_current);
    $stmt_current->bind_param("i", $document_id);
    $stmt_current->execute();
    $current = $stmt_current->get_result()->fetch_assoc();
    
    $chemin_document = $current['chemin_document'];
    $photo = $current['photo'];
    
    // ========== 1. GESTION DU NOUVEAU FICHIER ==========
    if(isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0 && !empty($_FILES['fichier']['name'])) {
        $fichier = $_FILES['fichier'];
        $extension = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));
        
        $sql_type = "SELECT libelle_typeDoc FROM TypeDocument WHERE typedocument_id = $typedocument_id";
        $result_type = $conn->query($sql_type);
        $type = $result_type->fetch_assoc();
        $libelle_type = strtolower($type['libelle_typeDoc']);
        
        $extension_valide = false;
        
        if($libelle_type == 'pdf') {
            if($extension == 'pdf') $extension_valide = true;
            else {
                $_SESSION['error'] = "Le type sélectionné est PDF. Veuillez uploader un fichier PDF.";
                header("Location: ../admin/cours/modifier_document.php?document_id=" . $document_id);
                exit();
            }
        } 
        elseif($libelle_type == 'vidéo' || $libelle_type == 'video') {
            $extensions_video = ['mp4', 'avi', 'mov', 'webm', 'mkv'];
            if(in_array($extension, $extensions_video)) $extension_valide = true;
            else {
                $_SESSION['error'] = "Le type sélectionné est Vidéo. Formats acceptés : MP4, AVI, MOV, WebM, MKV.";
                header("Location: ../admin/cours/modifier_document.php?document_id=" . $document_id);
                exit();
            }
        }
        else {
            if($extension == 'pdf') $extension_valide = true;
            else {
                $_SESSION['error'] = "Formats acceptés : PDF uniquement.";
                header("Location: ../admin/cours/modifier_document.php?document_id=" . $document_id);
                exit();
            }
        }
        
        if($extension_valide) {
            $nom_fichier = time() . "_" . uniqid() . "." . $extension;
            $target_file = $upload_dir_doc . $nom_fichier;
            
            if(move_uploaded_file($fichier['tmp_name'], $target_file)) {
                if(!empty($chemin_document)) {
                    $old_file = "../" . $chemin_document;
                    if(file_exists($old_file)) unlink($old_file);
                }
                $chemin_document = "uploads/documents/" . $nom_fichier;
            }
        }
    }
    
    // ========== 2. GESTION DE LA NOUVELLE PHOTO ==========
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0 && !empty($_FILES['photo']['name'])) {
        $photo_fichier = $_FILES['photo'];
        $extension_photo = strtolower(pathinfo($photo_fichier['name'], PATHINFO_EXTENSION));
        $extensions_image = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if(in_array($extension_photo, $extensions_image)) {
            $nom_photo = time() . "_photo_" . uniqid() . "." . $extension_photo;
            $target_photo = $upload_dir_photo . $nom_photo;
            
            if(move_uploaded_file($photo_fichier['tmp_name'], $target_photo)) {
                if(!empty($photo)) {
                    $old_photo = "../" . $photo;
                    if(file_exists($old_photo)) unlink($old_photo);
                }
                $photo = "uploads/document_photos/" . $nom_photo;
            }
        }
    }
    
    // ========== 3. MISE À JOUR DANS LA BASE DE DONNÉES ==========
    $sql = "UPDATE Document SET 
            nom_document = ?,
            chemin_document = ?,
            description_document = ?,
            photo = ?,
            nbre_page = ?,
            annee = ?,
            auteur_document = ?,
            active = ?,
            prix = ?,
            typedocument_id = ?,
            subject_id = ?,
            classroom_id = ?
            WHERE document_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssiisiiiii", 
        $nom_document, 
        $chemin_document, 
        $description_document, 
        $photo, 
        $nbre_page, 
        $annee, 
        $auteur_document, 
        $active, 
        $prix,              // ← NOUVEAU
        $typedocument_id, 
        $subject_id, 
        $classroom_id, 
        $document_id
    );
    
    if($stmt->execute()) {
        $_SESSION['success'] = "Document modifié avec succès !";
        header("Location: ../admin/cours/ajout_document.php?modif=1");
        exit();
    } else {
        $_SESSION['error'] = "Erreur lors de la modification : " . $conn->error;
        header("Location: ../admin/cours/modifier_document.php?document_id=" . $document_id);
        exit();
    }
    
    $stmt->close();
    $conn->close();
    
} else {
    header("Location: ../admin/cours/ajout_document.php");
    exit();
}
?>