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

            $upload_dir = "C:/xampp/htdocs/Mon-projet-e-learning/uploads/chapitres/";
          
            if(!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            $file_name = time() . "_" . $_FILES['media']['name'];
            $target_file = $upload_dir . $file_name;
            
            if(move_uploaded_file($_FILES['media']['tmp_name'], $target_file)) {
                
                $media_path = "uploads/chapitres/" . $file_name;
                
                // ✅ CORRECTION : Ajouter lessons_id dans l'insertion Media
                $sql_media = "INSERT INTO Media (chapter_id, lessons_id, file_name, media_type, media_path) 
                              VALUES (?, ?, ?, ?, ?)";
                $stmt_media = $conn->prepare($sql_media);
                $media_type = 'image';
                $stmt_media->bind_param("iisss", $chapitre_id, $lessons_id, $file_name, $media_type, $media_path);
                
                if($stmt_media->execute()) {
                    echo "Image uploadée avec succès!<br>";
                } else {
                    echo "Erreur lors de l'insertion dans Media: " . $stmt_media->error . "<br>";
                }
                $stmt_media->close();
            } else {
                echo "Erreur lors de l'upload du fichier<br>";
            }
        }
        
        header("Location: ../admin/cours/ajouter_chapitre.php?success=1");
        exit();
    } else {
        echo "Erreur lors de l'insertion du chapitre: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
} else {
    header("Location: ../admin/cours/ajouter_chapitre.php");
    exit();
}
?>