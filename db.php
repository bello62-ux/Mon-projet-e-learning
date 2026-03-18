<?php
$servername="localhost";
$username="root";
$password="";
$database="soutenance";
$conn= new mysqli($servername,$username,$password,$database);

if (!$conn) {
    die("Erreur de connexion " . $conn->connect_error);
}
// else {
//     echo "connexion reussie";
// }
?>