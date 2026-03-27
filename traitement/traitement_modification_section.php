<?php
$conn = new mysqli("localhost", "root", "", "cotonou");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["modifier"])) {
    $section_id = $_POST['section_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $chapter_id = $_POST['chapter_id'];
    $is_active = $_POST['is_active'];

    $sql = "UPDATE Section SET title=?, description=?, is_active=? WHERE section_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $title, $description, $is_active, $section_id);

    if($stmt->execute()) {
        header("Location: ../admin/details/details_chapitre.php?chapter_id=" . $chapter_id . "&success=section_edit");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../admin/cours/ajouter_chapitre.php");
    exit();
}
?>