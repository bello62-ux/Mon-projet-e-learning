<?php
$conn = new mysqli("localhost", "root", "", "cotonou");

if($conn->connect_error){
    die("connexion failed: " . $conn->connect_error);
}

if(isset($_POST["ajouter"])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $classroom_id = !empty($_POST['classroom_id']) ? $_POST['classroom_id'] : null;
    $subject_id = !empty($_POST['subject_id']) ? $_POST['subject_id'] : null;
    $user_id = $_SESSION['user_id'] ?? null;
    $time = !empty($_POST['time']) ? $_POST['time'] : null;
    $is_active = $_POST['is_active'] ?? 1;
    $media_path = "";
    $file_name = "";

    // Insérer la leçon d'abord
    $sql = "INSERT INTO lessons (title, description, classroom_id, subject_id, user_id, time, is_active) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiisi", $title, $description, $classroom_id, $subject_id, $user_id, $time, $is_active);

    if($stmt->execute()){
        $lecon_id = $conn->insert_id;
        
        // Gestion de l'upload d'image APRÈS avoir l'ID de la leçon
        if(isset($_FILES['media']) && $_FILES['media']['error'] == 0) {
            // ✅ CHEMIN ABSOLU
            $upload_dir = "C:/xampp/htdocs/Mon-projet-e-learning/uploads/lecons/";
            
            // Créer le dossier s'il n'existe pas
            if(!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            $file_name = time() . "_" . $_FILES['media']['name'];
            $target_file = $upload_dir . $file_name;
            
            if(move_uploaded_file($_FILES['media']['tmp_name'], $target_file)) {
                $media_path = "uploads/lecons/" . $file_name;
                
                // Insérer dans la table Media
                $sql_media = "INSERT INTO Media (lessons_id, file_name, media_type, media_path) 
                              VALUES (?, ?, ?, ?)";
                $stmt_media = $conn->prepare($sql_media);
                $media_type = 'image';
                $stmt_media->bind_param("isss", $lecon_id, $file_name, $media_type, $media_path);
                $stmt_media->execute();
                $stmt_media->close();
            }
        }
        
        header("location: ../admin/cours/ajouter_lecon.php?success=1");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("location: ../admin/cours/ajouter_lecon.php");
    exit();
}
?>