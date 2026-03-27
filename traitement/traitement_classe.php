<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cotonou";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["ajouter"])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
   

    $sql = "INSERT INTO classroom (name, description) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $description);

    if ($stmt->execute()) {
        header("Location: ../admin/cours/ajouter_classe.php?success=1");
        exit;
    } else {
        echo "Erreur: " . $conn->error;
    }

    $stmt->close();
} else {
    header("Location: ../admin/cours/ajouter_classe.php");
    exit;
}

$conn->close();
?>