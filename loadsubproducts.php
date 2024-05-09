<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";

    $productID = $_POST['yourIntegerParameter'];
    $sql = "SELECT * FROM subproduct WHERE ProductRef='$productID'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $Sp = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($Sp);
    
} else {
    echo 'Invalid request';
}

?>