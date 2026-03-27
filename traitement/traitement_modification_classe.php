<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cotonou";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["modifier"])) {

    $classroom_id = $_POST['classroom_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
  

    $sql = "UPDATE classroom SET name=?, description=? WHERE classroom_id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $description, $classroom_id);

    if($stmt->execute()) {
        header("Location: ../admin/cours/ajouter_classe.php?modif=1");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../admin/cours/ajouter_classe.php");
    exit();
}
?>