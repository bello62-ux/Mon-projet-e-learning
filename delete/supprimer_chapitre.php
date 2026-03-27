<?php
if(isset($_GET['chapter_id'])){
    $chapter_id = $_GET['chapter_id'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cotonou";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $chapter_id = $conn->real_escape_string($chapter_id);
    
    // Récupérer les médias avant suppression
    $sql_media = "SELECT media_path FROM Media WHERE chapitre_id='$chapter_id'";
    $result_media = $conn->query($sql_media);
    while($media = $result_media->fetch_assoc()) {
        $file_path = "../../" . $media['media_path'];
        if(file_exists($file_path)) {
            unlink($file_path); // Supprimer le fichier
        }
    }
    
    $check_sql = "SELECT COUNT(*) as total FROM Section WHERE chapter_id='$chapter_id'";
    $result = $conn->query($check_sql);
    $row = $result->fetch_assoc();
    $total_sections = $row['total'];
    
    if($total_sections > 0) {
        header("Location: ../admin/cours/ajouter_chapitre.php?error=has_sections&count=" . $total_sections);
        exit();
    } else {
        $sql = "DELETE FROM Chapters WHERE chapter_id='$chapter_id'";

        if($conn->query($sql) === TRUE){
            header("Location: ../admin/cours/ajouter_chapitre.php?delete=1");
            exit();
        } else {
            echo "Erreur lors de la suppression: " . $conn->error;
        }
    }

    $conn->close();

} else {
    header("Location: ../admin/cours/ajouter_chapitre.php");
    exit();
}
?>