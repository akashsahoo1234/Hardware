<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $product = $_POST['product'];
    $Aqmake = $_POST['make'];
    $AqModel = $_POST['model'];
    $AqAmount = $_POST['amount'];
    $Order = $_POST['order'];
    $AqDesc = $_POST['description'];
    $productCat = $_POST['productCat'];
    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("INSERT INTO acquire(AqId,AqModel,AqAmount,OrderNo,AqDesc,AqDate,MakeRef,ProductRef,SubRef) VALUES (:value1, :value2, :value3, :value6, :value4, :value5, :value7, :value8, :value9)");
    
        // Bind parameters
        $stmt->bindParam(':value1', $value1);
        $stmt->bindParam(':value2', $value2);
        $stmt->bindParam(':value3', $value3);
        $stmt->bindParam(':value4', $value4);
        $stmt->bindParam(':value5', $value5);
        $stmt->bindParam(':value6', $value6);
        $stmt->bindParam(':value7', $value7);
        $stmt->bindParam(':value8', $value8);
        $stmt->bindParam(':value9', $value9);
    
        // Set the values of the parameters
        $value1 = NULL;
        $value2 = $AqModel;
        $value3 = $AqAmount;
        $value4 = $AqDesc;
        date_default_timezone_set('Asia/Kolkata');
        $dateTime = new DateTime('now');
        $formattedDateTime = $dateTime->format('Y-m-d');
        $value5 = $formattedDateTime;
        $value6 = $Order;
        $value7 = $Aqmake;
        $value8 = $productCat;
        $value9 = $product;
    
        // Execute the prepared statement
        $stmt->execute();
        $query2 = "INSERT INTO availability(AvCat, AvPr,AvMake,AvModel,Amount) VALUES (:value10, :value11, :value12, :value13, :value14) ON DUPLICATE KEY UPDATE Amount = Amount + :amount_to_add ";
        $stmt2 = $pdo->prepare($query2);

        $stmt2->bindParam(':value10', $value10);
        $stmt2->bindParam(':value11', $value11);
        $stmt2->bindParam(':value12', $value12);
        $stmt2->bindParam(':value13', $value13);
        $stmt2->bindParam(':value14', $value14);
        $stmt2->bindParam(':amount_to_add', $amount_to_add);

        $value10 = $productCat;
        $value11 = $product;
        $value12 = $Aqmake;
        $value13 = $AqModel;
        $value14 = $AqAmount;
        $amount_to_add = $AqAmount;

        // Execute the second query
        $stmt2->execute();
        $pdo->commit();
        echo "Both queries executed successfully!";
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