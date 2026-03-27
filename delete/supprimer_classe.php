<?php
// Vérifier si l'ID est présent dans l'URL
if (isset($_GET['classroom_id'])){
    
    $classroom_id = $_GET['classroom_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cotonou";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $classroom_id = $conn->real_escape_string($classroom_id);
    
    $check_lessons = "SELECT COUNT(*) as total FROM lessons WHERE classroom_id='$classroom_id'";
    $result_lessons = $conn->query($check_lessons);
    $row_lessons = $result_lessons->fetch_assoc();
    $total_lessons = $row_lessons['total'];
    
    $check_users = "SELECT COUNT(*) as total FROM users WHERE classroom_id='$classroom_id'";
    $result_users = $conn->query($check_users);
    $row_users = $result_users->fetch_assoc();
    $total_users = $row_users['total'];
    
    if($total_lessons > 0) {
        header("Location: ../admin/cours/ajouter_classe.php?error=has_lessons&count=" . $total_lessons);
        exit();
    } elseif($total_users > 0) {
        header("Location: ../admin/cours/ajouter_classe.php?error=has_users&count=" . $total_users);
        exit();
    } else {
      
        $sql = "DELETE FROM classroom WHERE classroom_id='$classroom_id'";

        if($conn->query($sql) === TRUE){
            header("Location: ../admin/cours/ajouter_classe.php?delete=1");
            exit();
        } else {
            echo "Erreur lors de la suppression: " . $conn->error;
        }
    }

    $conn->close();

} else {
    // Si pas d'ID, redirection
    header("Location: ../admin/cours/ajouter_classe.php");
    exit();
}
?>