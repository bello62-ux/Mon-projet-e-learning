<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cotonou";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["ajouter"])) {
    // Récupérer les valeurs du formulaire
    $libelle = $_POST['nom'];
    
    $sql = "INSERT INTO TypeDocument (libelle_typeDoc) VALUES ('$libelle')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin/cours/ajouter_type_document.php?success=1");
        exit();
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Erreur récupération des données.";
}

// Fermer la connexion
$conn->close();
?>