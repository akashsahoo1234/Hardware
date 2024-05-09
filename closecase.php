<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $targetID = $_POST["targetID"];
    try {
    $pdo->beginTransaction();
    date_default_timezone_set('Asia/Kolkata');
    $Date = date("Y-m-d H:i:s");
    $sql = "UPDATE brkcases SET BrkSt = ? , BrkCl = ? where BrkId = ? ";
    $stmt = $pdo->prepare($sql);
    $status = "10";
    $stmt->bindParam(1, $status );
    $stmt->bindParam(2, $Date);
    $stmt->bindParam(3, $targetID);
    $stmt->execute();

    $stmt3 = $pdo->prepare("UPDATE  brkhours SET Brh = Brh + (SELECT TIMESTAMPDIFF(HOUR, BrkOp, BrkCl) AS hour_difference FROM brkcases WHERE BrkId = ? ) 
    WHERE BrhM =  ( SELECT BrkM FROM brkcases WHERE BrkId = ? ) ");
    
    $stmt3->bindParam(1, $targetID);
    $stmt3->bindParam(2, $targetID);
    $stmt3->execute();
    $pdo->commit();
            
    echo "Case Closed";
    } catch (PDOException $e) {
    // If an exception occurs, roll back the transaction
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}

} else {
    echo 'Invalid request';
}
?>