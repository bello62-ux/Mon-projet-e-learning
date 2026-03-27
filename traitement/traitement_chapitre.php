<?php
$conn = new mysqli("localhost", "root", "", "cotonou");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["ajouter"])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $lessons_id = !empty($_POST['lessons_id']) ? $_POST['lessons_id'] : null;
    $is_active = $_POST['is_active'] ?? 1;
    $media_path = "";
    $file_name = "";
    
    // Insérer le chapitre d'abord
    $sql = "INSERT INTO Chapters (title, description, lessons_id, is_active) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $title, $description, $lessons_id, $is_active);
    
    if($stmt->execute()) {
        $chapitre_id = $conn->insert_id;
        
        if(isset($_FILES['media']) && $_FILES['media']['error'] == 0) {

            $upload_dir = "D:/Sites/Lab/Mon-projet-e-learning/PROJET SOUTENANCE/uploads/chapitres/";
          
            if(!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            $file_name = time() . "_" . $_FILES['media']['name'];
            $target_file = $upload_dir . $file_name;
            
            echo "Chemin d'upload: " . $target_file . "<br>";
            
            if(move_uploaded_file($_FILES['media']['tmp_name'], $target_file)) {
                
                $media_path = "uploads/chapitres/" . $file_name;
                
                // Insérer dans la table Media
                $sql_media = "INSERT INTO Media (chapitre_id, file_name, media_type, media_path) 
                              VALUES (?, ?, ?, ?)";
                $stmt_media = $conn->prepare($sql_media);
                $media_type = 'image';
                $stmt_media->bind_param("isss", $chapitre_id, $file_name, $media_type, $media_path);
                $stmt_media->execute();
                $stmt_media->close();
                
                echo "Image uploadée avec succès!<br>";
            } else {
                echo "Erreur lors de l'upload<br>";
            }
        }
        
        header("Location: ../admin/cours/ajouter_chapitre.php?success=1");
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