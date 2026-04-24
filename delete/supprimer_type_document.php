<?php
// Vérifier si l'ID est présent
if(isset($_GET['typedocument_id'])){
    $typedocument_id = $_GET['typedocument_id'];
    
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cotonou";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Protection contre les injections SQL
    $typedocument_id = $conn->real_escape_string($typedocument_id);
    
    // ✅ Vérifier si des documents sont liés à ce type
    $check_sql = "SELECT COUNT(*) as total FROM document WHERE typedocument_id='$typedocument_id'";
    $result = $conn->query($check_sql);
    $row = $result->fetch_assoc();
    $total_documents = $row['total'];
    
    if($total_documents > 0) {
        // ❌ Impossible de supprimer : il y a des documents associés
        header("Location: ../admin/cours/ajout_type_document.php?error=has_documents&count=" . $total_documents);
        exit();
    } else {
        // ✅ Pas de documents, on peut supprimer
        $sql = "DELETE FROM TypeDocument WHERE typedocument_id='$typedocument_id'";

        if($conn->query($sql) === TRUE){
            header("Location: ../admin/cours/ajouter_type_document.php?delete=1");
            exit();
        } else {
            echo "Erreur lors de la suppression: " . $conn->error;
        }
    }
    
    $conn->close();
} else {
    header("Location: ../admin/cours/ajout_type_document.php");
    exit();
}
?>