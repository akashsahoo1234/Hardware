<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $unit = $_POST['unit'];
    $dept = $_POST['dept'];
    $loc = $_POST['loc'];
    $comp = $_POST['comp'];
    $name = $_POST['name'];
    $ph = $_POST['ph'];
    $sl = $_POST['sl'];
    $rk = $_POST['rk'];
    $by = $_POST['loggedUser'];
    $ip = $_POST['ip'];
    $id = $_POST['id'];
    $status = $_POST['status'];

    try {
        $pdo->beginTransaction();
            $updateStmt = $pdo->prepare("UPDATE installation SET 
            InU = ? ,
            InD = ? ,
            InL = ? ,
            InM = ? ,
            InCo = ? ,
            InN = ? ,
            InP = ? ,
            InSt = ? ,
            InRk = ? ,
            InBy = ? ,
            ipv4 = ? 
            WHERE InId = ? ");
            $updateStmt->bindParam(1, $unit );
            $updateStmt->bindParam(2, $dept);
            $updateStmt->bindParam(3, $loc);
            $updateStmt->bindParam(4, $sl);
            $updateStmt->bindParam(5, $comp);
            $updateStmt->bindParam(6, $name);
            $updateStmt->bindParam(7, $ph);
            $updateStmt->bindParam(8, $status);
            $updateStmt->bindParam(9, $rk);
            $updateStmt->bindParam(10, $by);
            $updateStmt->bindParam(11, $ip);
            $updateStmt->bindParam(12, $id , PDO::PARAM_INT);
            $updateStmt->execute();
            
            $pdo->commit();
            
            echo "Updated successfully!";
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