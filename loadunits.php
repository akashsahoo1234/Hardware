<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $sql = "SELECT * FROM units";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $units = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($units);
    
} else {
    echo 'Invalid request';
}

?>