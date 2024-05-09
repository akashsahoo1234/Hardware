<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $sql = "SELECT * FROM departments";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($departments);
    
} else {
    echo 'Invalid request';
}

?>