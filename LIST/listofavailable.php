<?php
session_start();

// Establish a database connection
$dsn = 'mysql:host=localhost;dbname=eandt;charset=utf8mb4';
$dbUsername = 'root';
$dbPassword = '';

try {
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sub = isset($_GET['sub']) ? $_GET['sub'] : null;
    $keyy = isset($_GET['key']) ? $_GET['key'] : null;
    $sql = "SELECT AggregatedData.AvPr  As AvPr,availability.AvModel As AvMod,availability.Amount As AvAm ,AggregatedData.TotalAmount As AvTo ,AggregatedData.TotalCount As AvCount
            FROM availability 
            JOIN (
            SELECT AvPr, SUM(Amount) AS TotalAmount, COUNT(*) AS TotalCount 
            FROM availability 
            WHERE AvCat = :keyy AND
            (COALESCE(:sub, '') = '' OR AvPr = :sub)
            GROUP BY AvPr) AS AggregatedData ON availability.AvPr = AggregatedData.AvPr;";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":sub", $sub);
    $stmt->bindParam(":keyy", $keyy);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $output = "";
    $output .= '<table class="table table-bordered" id="down-ipv4">
    <thead class="thead-dark sticky-header">
        <tr>
        <th scope="col">product</th>
        <th scope="col">Model</th>
        <th scope="col">Amount</th>
        <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>';
    if (count($data) > 0) {

        foreach ($data as $row) {
            $output .= "<tr>
                        <td>{$row["AvPr"]}</td>
                        <td>{$row["AvMod"]}</td>
                        <td>{$row["AvAm"]}</td>
                        <td>{$row["AvTo"]}</td>
                        </tr>";
        }
        $output .= "</tbody></table>";
    }
    echo $output;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
