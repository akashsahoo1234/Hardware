<?php
session_start();

// Establish a database connection
$dsn = 'mysql:host=localhost;dbname=eandt;port=3307;charset=utf8mb4';
$dbUsername = 'A95001601';
$dbPassword = ']LndlFoSv@nocZnP';

try {
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>