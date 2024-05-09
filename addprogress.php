<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $targetID = $_POST["targetID"];
    $progress = $_POST["progress"];
    try {
        date_default_timezone_set('Asia/Kolkata');
        $Date = date("Y-m-d H:i:s");
        $sql = "UPDATE brkcases SET BrkPr = CONCAT(COALESCE(BrkPr, ''), ?) WHERE BrkId = ?";
        $stmt = $pdo->prepare($sql);
        $progressData = "\n" . $Date . " :: " . $progress;
        $stmt->execute([$progressData, $targetID]);
        
    } catch (PDOException $e) {
        // If an exception occurs, roll back the transaction
        echo "Error: " . $e->getMessage();
    }
} else {
    echo 'Invalid request';
}
?>
