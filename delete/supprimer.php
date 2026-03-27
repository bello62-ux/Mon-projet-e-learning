<?php
// Vérifier si l'ID est présent
if(isset($_GET['subject_id'])){
    $subject_id = $_GET['subject_id'];
    
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cotonou";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Protéger contre les injections SQL
    $subject_id = $conn->real_escape_string($subject_id);
    
    // ✅ Vérifier si des leçons sont liées à cette matière
    $check_sql = "SELECT COUNT(*) as total FROM lessons WHERE subject_id='$subject_id'";
    $result = $conn->query($check_sql);
    $row = $result->fetch_assoc();
    $total_lessons = $row['total'];
    
    if($total_lessons > 0) {
        // ❌ Impossible de supprimer : il y a des leçons
        header("Location: ../admin/cours/ajouter_matière.php?error=has_lessons&count=" . $total_lessons);
        exit();
    } else {
        // ✅ Pas de leçons, on peut supprimer
        $sql = "DELETE FROM subject WHERE subject_id='$subject_id'";

        if($conn->query($sql) === TRUE){
            header("Location: ../admin/cours/ajouter_matière.php?delete=1");
            exit();
        } else {
            echo "Erreur lors de la suppression: " . $conn->error;
        }
    }
    
    $conn->close();
} else {
    header("Location: ../admin/cours/ajouter_matière.php");
    exit();
}
?>