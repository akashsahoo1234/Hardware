<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $targetID = $_POST["targetID"];
    try {
    date_default_timezone_set('Asia/Kolkata');
    $Date = date("Y-m-d H:i:s");
    $sql = "UPDATE brkcases SET BrkSt = ? , BrkOp = ? where BrkId = ? ";
    $stmt = $pdo->prepare($sql);
    $status = "01";
    $stmt->bindParam(1, $status );
    $stmt->bindParam(2, $Date);
    $stmt->bindParam(3, $targetID);
    $stmt->execute();
    echo "Case opened Successfully";
    } catch (PDOException $e) {
    // If an exception occurs, roll back the transaction
    echo "Error: " . $e->getMessage();
}

} else {
    echo 'Invalid request';
}

?>