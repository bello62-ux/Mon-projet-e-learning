<?php
//Verifier si les donnees du formulaire ont ete soumis
if(isset($_POST['modifier'])){
    //Recupere  les valeurs au niveau du nom du formulaire
    $nom = $_POST['nom'];   
    $subject_id = $_POST['subject_id'];
       // Connexion à la base de données (modifier les paramètres selon votre configuration)
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "cotonou";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Vérifier la connexion
      if ($conn->connect_error) {
      die("Connection failed: "  .$conn->connect_error);
      }
      
      $sql = "UPDATE subject SET name='$nom' WHERE subject_id='$subject_id'";

      if($conn->query($sql) === TRUE){
        header("Location: ../admin/cours/ajouter_matière.php?modif=1");
      }else{
        echo "Erreur lors de la mise a jour";
      }
      $conn->close();
}else{
    echo "les donnees ont ete modifier";
    exit;

}
?>