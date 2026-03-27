<?php
if(isset($_GET['section_id']) && isset($_GET['chapter_id'])){
    $section_id = $_GET['section_id'];
    $chapter_id = $_GET['chapter_id'];
    
    $conn = new mysqli("localhost", "root", "", "cotonou");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $section_id = $conn->real_escape_string($section_id);
    $sql = "DELETE FROM Section WHERE section_id='$section_id'";
    
    if($conn->query($sql) === TRUE){
        header("Location: ../admin/details/details_chapitre.php?chapter_id=" . $chapter_id . "&success=section_delete");
        exit();
    } else {
        echo "Erreur lors de la suppression: " . $conn->error;
    }
    
    $conn->close();
} else {
    header("Location: ../admin/cours/ajouter_chapitre.php");
    exit();
}
?>