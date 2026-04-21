<?php
$conn = new mysqli("localhost", "root", "", "cotonou");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["modifier"])) {
    $chapter_id = $_POST['chapter_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $lessons_id = !empty($_POST['lessons_id']) ? $_POST['lessons_id'] : null;
    $is_active = $_POST['is_active'];
    
    // Gestion de l'image
    if(isset($_FILES['media']) && $_FILES['media']['error'] == 0) {
        $upload_dir = "D:/Sites/Lab/Mon-projet-e-learning/PROJET SOUTENANCE/uploads/chapitres/";
        if(!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = time() . "_" . $_FILES['media']['name'];
        $target_file = $upload_dir . $file_name;
        
        if(move_uploaded_file($_FILES['media']['tmp_name'], $target_file)) {
            $media_path = "uploads/chapitres/" . $file_name;
            
            // ✅ Vérifier si un média existe déjà pour ce CHAPITRE
            $sql_check = "SELECT media_id, media_path FROM Media WHERE chapter_id = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("i", $chapter_id);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            $existing_media = $result_check->fetch_assoc();
            
            if($existing_media) {
                // ✅ Mettre à jour l'existant
                $sql_media = "UPDATE Media SET file_name=?, media_path=?, media_type=?, lessons_id=? WHERE media_id=?";
                $stmt_media = $conn->prepare($sql_media);
                $media_type = 'image';
                $stmt_media->bind_param("sssii", $file_name, $media_path, $media_type, $lessons_id, $existing_media['media_id']);
                $stmt_media->execute();
                $stmt_media->close();
                
                // Supprimer l'ancien fichier
                if(!empty($existing_media['media_path'])) {
                    $old_file = "D:/Sites/Lab/Mon-projet-e-learning/PROJET SOUTENANCE/" . $existing_media['media_path'];
                    if(file_exists($old_file)) {
                        unlink($old_file);
                    }
                }
            } else {
                // ✅ Insérer un nouveau média (avec lessons_id obligatoire)
                $sql_media = "INSERT INTO Media (chapter_id, lessons_id, file_name, media_type, media_path) 
                              VALUES (?, ?, ?, ?, ?)";
                $stmt_media = $conn->prepare($sql_media);
                $media_type = 'image';
                $stmt_media->bind_param("iisss", $chapter_id, $lessons_id, $file_name, $media_type, $media_path);
                $stmt_media->execute();
                $stmt_media->close();
            }
        }
    }
    
    // Mettre à jour le chapitre
    $sql = "UPDATE Chapters SET title=?, description=?, lessons_id=?, is_active=? WHERE chapter_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiii", $title, $description, $lessons_id, $is_active, $chapter_id);
    
    if($stmt->execute()) {
        header("Location: ../admin/cours/ajouter_chapitre.php?modif=1");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
} else {
    header("Location: ../admin/cours/ajouter_chapitre.php");
    exit();
}
?>