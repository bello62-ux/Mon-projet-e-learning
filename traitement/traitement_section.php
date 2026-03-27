<?php
$conn = new mysqli("localhost", "root", "", "cotonou");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["ajouter"])) {
    $chapter_id = $_POST['chapter_id'];
    $titles = $_POST['titles'];
    $descriptions = $_POST['descriptions'];
    $status = $_POST['status'];
    $redirect = $_POST['redirect'] ?? 'details';
    
    $success_count = 0;
    
    $sql = "INSERT INTO Section (title, description, chapter_id, is_active) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    for($i = 0; $i < count($titles); $i++) {
        $title = trim($titles[$i]);
        $description = trim($descriptions[$i]);
        $is_active = $status[$i];
        
        if(!empty($title) && !empty($description)) {
            $stmt->bind_param("ssii", $title, $description, $chapter_id, $is_active);
            if($stmt->execute()) {
                $success_count++;
            }
        }
    }
    
    $stmt->close();
    $conn->close();
    
    if($redirect == 'details') {
        header("Location: ../admin/details/details_chapitre.php?chapter_id=" . $chapter_id . "&success=multiple&count=" . $success_count);
    } else {
        header("Location: ../admin/cours/ajouter_section.php?chapter_id=" . $chapter_id . "&success=add");
    }
    exit();
    
} else {
    header("Location: ../admin/cours/ajouter_chapitre.php");
    exit();
}
?>