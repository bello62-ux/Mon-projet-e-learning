<?php
if(isset($_GET['lessons_id'])){
    $lessons_id = $_GET['lessons_id'];
    
    $conn = new mysqli("localhost", "root", "", "cotonou");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $lessons_id = $conn->real_escape_string($lessons_id);
    
    // ✅ Vérifier si des chapitres sont liés à cette leçon
    $check_sql = "SELECT COUNT(*) as total FROM chapters WHERE lessons_id='$lessons_id'";
    $result = $conn->query($check_sql);
    $row = $result->fetch_assoc();
    $total_chapters = $row['total'];
    
    if($total_chapters > 0) {
        // ❌ Impossible de supprimer : il y a des chapitres
        header("Location: ../admin/cours/ajouter_lecon.php?error=has_chapters&count=" . $total_chapters);
        exit();
    } else {
        // ✅ Pas de chapitres, on peut supprimer
        $sql = "DELETE FROM lessons WHERE lessons_id='$lessons_id'";
        
        if($conn->query($sql) === TRUE){
            header("Location: ../admin/cours/ajouter_lecon.php?delete=1");
            exit();
        } else {
            echo "Erreur lors de la suppression: " . $conn->error;
        }
    }
    
    $conn->close();
} else {
    header("Location: ../admin/cours/ajouter_lecon.php");
    exit();
}
?>