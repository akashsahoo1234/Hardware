<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";

    $productmake = $_POST['makename'];
    $productCat = $_POST['productCat'];
    try {

        $stmt = $pdo->prepare("INSERT INTO productmake(MakeID, make, product) VALUES (:value1, :value2, :value3)");
    
        // Bind parameters
        $stmt->bindParam(':value1', $value1);
        $stmt->bindParam(':value2', $value2);
        $stmt->bindParam(':value3', $value3);
    
        // Set the values of the parameters
        $value1 = NULL;
        $value2 = $productmake;
        $value3 = $productCat;
    
        // Execute the prepared statement
        $stmt->execute();
    
        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close the connection
    $pdo = null;
    
} else {
    echo 'Invalid request';
}

?>