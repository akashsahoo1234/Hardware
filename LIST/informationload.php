<?php
session_start();

// Establish a database connection
$dsn = 'mysql:host=localhost;dbname=eandt;port=3307;charset=utf8mb4';
$dbUsername = 'A95001601';
$dbPassword = ']LndlFoSv@nocZnP';

try {
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $slno = $_GET['slno'];
    $sql2="Select count(*) as count_cases , SUM(TIMESTAMPDIFF(HOUR, BrkOp, BrkCl)) AS sum_hours FROM brkcases where BrkM=:slno AND BrkSt='10';";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(":slno", $slno);
    $stmt2->execute();
    $data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    if (count($data2) > 0) {

        foreach ($data2 as $row) {  
            $output .= "<div class='form-group mt-4'id='information-loading'>
            <h4 class='text-danger'>Breakdown Cases : {$row["count_cases"]}</h4>
            <h4 class='text-success'>Breakdown Hours : {$row["sum_hours"]}</h4>
            </div>";            
            
        }

    }
    echo $output;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
