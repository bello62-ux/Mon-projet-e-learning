<?php
session_start();
require_once '../config/db.php';

if(!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1){
    header("Location: ../authentification/login.php");
    exit();
}

if(isset($_POST["ajouter"])) {
    
    $typedocument_id = intval($_POST['typedocument_id']);
    $classroom_id = intval($_POST['classroom_id']);
    $subject_id = intval($_POST['subject_id']);
    $nom_document = trim($_POST['nom_document']);
    $auteur_document = !empty(trim($_POST['auteur_document'])) ? trim($_POST['auteur_document']) : '';
    $annee = !empty($_POST['annee']) ? intval($_POST['annee']) : 0;
    $nbre_page = !empty($_POST['nbre_page']) ? intval($_POST['nbre_page']) : 0;
    $description_document = trim($_POST['description_document']) ?? '';
    $active = isset($_POST['active']) ? intval($_POST['active']) : 1;
    $prix = !empty($_POST['prix']) ? floatval($_POST['prix']) : 0;  // ← NOUVEAU
    
    $upload_dir_doc = "D:/Sites/Lab/Mon-projet-e-learning/PROJET SOUTENANCE/uploads/documents/";
    $upload_dir_photo = "D:/Sites/Lab/Mon-projet-e-learning/PROJET SOUTENANCE/uploads/document_photos/";
    
    if(!is_dir($upload_dir_doc)) mkdir($upload_dir_doc, 0777, true);
    if(!is_dir($upload_dir_photo)) mkdir($upload_dir_photo, 0777, true);
    
    $chemin_document = "";
    if(isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {
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
                header("Location: ../admin/cours/ajout_document.php");
                exit();
            }
        } 
        elseif($libelle_type == 'vidéo' || $libelle_type == 'video') {
            $extensions_video = ['mp4', 'avi', 'mov', 'webm', 'mkv'];
            if(in_array($extension, $extensions_video)) $extension_valide = true;
            else {
                $_SESSION['error'] = "Le type sélectionné est Vidéo. Formats acceptés : MP4, AVI, MOV, WebM, MKV.";
                header("Location: ../admin/cours/ajout_document.php");
                exit();
            }
        }
        else {
            if($extension == 'pdf') $extension_valide = true;
            else {
                $_SESSION['error'] = "Formats acceptés : PDF uniquement.";
                header("Location: ../admin/cours/ajout_document.php");
                exit();
            }
        }
        
        if($extension_valide) {
            $nom_fichier = time() . "_" . uniqid() . "." . $extension;
            $target_file = $upload_dir_doc . $nom_fichier;
            
            if(move_uploaded_file($fichier['tmp_name'], $target_file)) {
                $chemin_document = "uploads/documents/" . $nom_fichier;
            } else {
                $_SESSION['error'] = "Erreur lors de l'upload du fichier.";
                header("Location: ../admin/cours/ajout_document.php");
                exit();
            }
        }
    } else {
        $_SESSION['error'] = "Veuillez sélectionner un fichier.";
        header("Location: ../admin/cours/ajout_document.php");
        exit();
    }
    
    $photo = "";
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0 && !empty($_FILES['photo']['name'])) {
        $photo_fichier = $_FILES['photo'];
        $extension_photo = strtolower(pathinfo($photo_fichier['name'], PATHINFO_EXTENSION));
        $extensions_image = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if(in_array($extension_photo, $extensions_image)) {
            $nom_photo = time() . "_photo_" . uniqid() . "." . $extension_photo;
            $target_photo = $upload_dir_photo . $nom_photo;
            
            if(move_uploaded_file($photo_fichier['tmp_name'], $target_photo)) {
                $photo = "uploads/document_photos/" . $nom_photo;
            }
        }
    }
    
    $sql = "INSERT INTO Document (nom_document, chemin_document, description_document, photo, nbre_page, annee, auteur_document, active, prix, typedocument_id, subject_id, classroom_id, date_creation) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("sssssiisiiii", 
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
        $classroom_id
    );
    
    if($stmt->execute()) {
        $_SESSION['success'] = "Document ajouté avec succès !";
        header("Location: ../admin/cours/ajout_document.php?success=1");
        exit();
    } else {
        $_SESSION['error'] = "Erreur lors de l'ajout : " . $conn->error;
        header("Location: ../admin/cours/ajout_document.php");
        exit();
    }
    
    $stmt->close();
    $conn->close();
    
} else {
    header("Location: ../admin/cours/ajout_document.php");
    exit();
}
?>