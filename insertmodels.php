<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";

    $SelectedMake = $_POST['SelectedMake'];
    $modelinput = $_POST['modelinput'];
    $ProductId = $_POST['productCat'];
    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("INSERT INTO productmodel(ModelID,ModelName,MakeID,ProductRef) VALUES (:value1, :value2, :value3, :value4)");
    
        // Bind parameters
        $stmt->bindParam(':value1', $value1);
        $stmt->bindParam(':value2', $value2);
        $stmt->bindParam(':value3', $value3);
        $stmt->bindParam(':value4', $value4);
    
        // Set the values of the parameters
        $value1 = NULL;
        $value2 = $modelinput;
        $value3 = $SelectedMake;
        $value4 = $ProductId;
    
        // Execute the prepared statement
        $stmt->execute();
        // $lastInsertId = $pdo->lastInsertId();
        // $stmt2 = $pdo->prepare("INSERT INTO available(AvModel,AvAmount) VALUES (:value4, :value5)");
    
        // // Bind parameters
        // $stmt2->bindParam(':value4', $value4);
        // $stmt2->bindParam(':value5', $value5);
        
    
        // // Set the values of the parameters
        // $value4 = $lastInsertId;
        // $value5 = 0;
        
    
        // // Execute the prepared statement
        // $stmt2->execute();
        $pdo->commit();
    
        echo "Both queries executed successfully!";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
    
    // Close the connection
    $pdo = null;
    
} else {
    echo 'Invalid request';
}

?>