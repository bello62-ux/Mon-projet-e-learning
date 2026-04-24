<?php
// Vérifier si les données du formulaire ont été soumises
if(isset($_POST['modifier'])){
    // Récupérer les valeurs du formulaire
    $libelle = $_POST['nom'];   
    $typedocument_id = $_POST['typedocument_id'];
    
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

    $sql = "UPDATE TypeDocument SET libelle_typeDoc='$libelle' WHERE typedocument_id='$typedocument_id'";

    if($conn->query($sql) === TRUE){
        header("Location: ../admin/cours/ajouter_type_document.php?modif=1");
        exit();
    } else {
        echo "Erreur lors de la mise à jour: " . $conn->error;
    }
    $conn->close();
} else {
    echo "Aucune donnée à modifier";
    exit();
}
?>