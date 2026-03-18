<?php
// mark_complete.php
session_start();

// DEBUG - AJOUTEZ CE CODE
error_log("=== MARK_COMPLETE DEBUG ===");
error_log("Session user_id: " . ($_SESSION['user_id'] ?? 'NOT SET'));
error_log("POST data: " . print_r($_POST, true));
error_log("cours_id reçu: " . ($_POST['cours_id'] ?? 'NULL'));
error_log("chapitre_id reçu: " . ($_POST['chapitre_id'] ?? 'NULL'));

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include('db.php');

$user_id = $_SESSION['user_id'];
$cours_id = $_POST['cours_id'];
$chapitre_id = $_POST['chapitre_id'];

// DEBUG - Vérifier quel cours est enregistré
error_log("Enregistrement pour cours_id: $cours_id");

// Vérifier si déjà terminé
$sql_check = "SELECT id FROM progress_cours WHERE user_id = ? AND cours_id = ? AND chapitre_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("iis", $user_id, $cours_id, $chapitre_id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    error_log("Mise à jour de l'existant");
    $sql_update = "UPDATE progress_cours SET termine = TRUE, date_completion = NOW() WHERE user_id = ? AND cours_id = ? AND chapitre_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("iis", $user_id, $cours_id, $chapitre_id);
    $stmt_update->execute();
} else {
    error_log("Insertion nouveau");
    $sql_insert = "INSERT INTO progress_cours (user_id, cours_id, chapitre_id, termine, date_completion) VALUES (?, ?, ?, TRUE, NOW())";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iis", $user_id, $cours_id, $chapitre_id);
    $stmt_insert->execute();
}

error_log("Succès pour cours_id: $cours_id");
echo "success";
?>