<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";

    $ModelID = $_POST['selectedOption'];
    $sql = "SELECT * FROM productmodel WHERE MakeID='$ModelID'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $makes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($makes);
    
} else {
    echo 'Invalid request';
}

?>