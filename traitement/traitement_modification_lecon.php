<?php
$conn = new mysqli("localhost", "root", "", "cotonou");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['modifier'])){
    $lessons_id = $_POST['lessons_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $classroom_id = !empty($_POST['classroom_id']) ? $_POST['classroom_id'] : null;
    $subject_id = !empty($_POST['subject_id']) ? $_POST['subject_id'] : null;
    $time = !empty($_POST['time']) ? $_POST['time'] : null;
    $is_active = $_POST['is_active'];
    
    // Gestion de l'upload d'image
    if(isset($_FILES['media']) && $_FILES['media']['error'] == 0) {
        // ✅ CHEMIN ABSOLU
        $upload_dir = "D:/Sites/Lab/Mon-projet-e-learning/PROJET SOUTENANCE/uploads/lecons/";
        
        if(!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = time() . "_" . $_FILES['media']['name'];
        $target_file = $upload_dir . $file_name;
        
        if(move_uploaded_file($_FILES['media']['tmp_name'], $target_file)) {
            $media_path = "uploads/lecons/" . $file_name;
            
            // ✅ Vérifier si un média existe déjà pour cette leçon
            $sql_check = "SELECT media_id, media_path FROM Media WHERE lecon_id = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("i", $lessons_id);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            $existing_media = $result_check->fetch_assoc();
            
            if($existing_media) {
                // ✅ Mettre à jour l'existant (au lieu d'insérer)
                $sql_media = "UPDATE Media SET file_name=?, media_path=?, media_type=? WHERE media_id=?";
                $stmt_media = $conn->prepare($sql_media);
                $media_type = 'image';
                $stmt_media->bind_param("sssi", $file_name, $media_path, $media_type, $existing_media['media_id']);
                $stmt_media->execute();
                $stmt_media->close();
                
                // Supprimer l'ancien fichier
                if(!empty($existing_media['media_path']) && file_exists("../../" . $existing_media['media_path'])) {
                    unlink("../../" . $existing_media['media_path']);
                }
            } else {
                // ✅ Insérer un nouveau média
                $sql_media = "INSERT INTO Media (lessons_id, file_name, media_type, media_path) 
                              VALUES (?, ?, ?, ?)";
                $stmt_media = $conn->prepare($sql_media);
                $media_type = 'image';
                $stmt_media->bind_param("isss", $lessons_id, $file_name, $media_type, $media_path);
                $stmt_media->execute();
                $stmt_media->close();
            }
        }
    }

    $sql = "UPDATE Lessons SET title=?, description=?, classroom_id=?, subject_id=?, time=?, is_active=? WHERE lessons_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiisii", $title, $description, $classroom_id, $subject_id, $time, $is_active, $lessons_id);

    if($stmt->execute()) {
        header("Location: ../admin/cours/ajouter_lecon.php?modif=1");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../admin/cours/ajouter_lecon.php");
    exit();
}
?>