<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";

    $name = $_POST['name'];
    $ph = $_POST['ph'];
    $sl = $_POST['sl'];
    $rk = $_POST['rk'];
    try {

            $pdo->beginTransaction();
            $stmt = $pdo->prepare("SELECT * FROM brkcases WHERE BrkM = ? AND ( BrkSt = ? OR BrkSt = ? ) ");
            $stmt->bindParam(1, $sl);
            $stmt->bindParam(2, $value10);
            $stmt->bindParam(3, $value11);
            $value10 = "00";
            $value11 = "01";
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                echo "Machine have an Active Case";

            }
            else
            {
                $stmt2 = $pdo->prepare("INSERT INTO brkcases(BrkId, BrkM, BrkRg , BrkOp, BrkCl, BrkSt,BrkPb, BrkPr) VALUES (:value1, :value2, :value9, :value3, :value4, :value5, :value6, :value7)");

            $stmt2->bindParam(':value1', $value1);
            $stmt2->bindParam(':value2', $value2);
            $stmt2->bindParam(':value9', $value9);
            $stmt2->bindParam(':value3', $value3);
            $stmt2->bindParam(':value4', $value4);
            $stmt2->bindParam(':value5', $value5);
            $stmt2->bindParam(':value6', $value6);
            $stmt2->bindParam(':value7', $value7);

            $value1 = NULL;
            $value2 = $sl;
            date_default_timezone_set('Asia/Kolkata');
            $dateTime = new DateTime('now');
            $formattedDateTime = $dateTime->format('Y-m-d H:i:s');
            $value3 =  NULL;
            $value4 = NULL;
            $value5 = '00';
            $value6 = $rk;
            $value7 = NULL;
            $value9 = $formattedDateTime;
            $stmt2->execute();
            
            $updateStmt = $pdo->prepare("UPDATE installation SET InN = ? , InP = ? , InSt = ? WHERE InM = ?");
            $updateStmt->bindParam(1, $name);
            $updateStmt->bindParam(2, $ph);
            $updateStmt->bindParam(3, $value8);
            $updateStmt->bindParam(4, $sl);
            $value8 = 'A';
            $updateStmt->execute();
            echo "Case Registered Successfully !";

            }
            
            $pdo->commit();
            
            

    } catch (PDOException $e) {
        // If an exception occurs, roll back the transaction
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
    
    // Close the connection
    $pdo = null;
    
} else {
    echo 'Invalid request';
}

?>