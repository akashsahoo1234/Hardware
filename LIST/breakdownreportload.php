<?php
session_start();

// Establish a database connection
$dsn = 'mysql:host=localhost;dbname=eandt;port=3307;charset=utf8mb4';
$dbUsername = 'A95001601';
$dbPassword = ']LndlFoSv@nocZnP';

try {
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $std = $_GET['std'];
    $end = $_GET['end'];
    $sql="SELECT 
    i.InId AS sl_no,
    MAX(CASE WHEN bc.BrkSt != '00' THEN bc.BrkOp END) AS open,
    MAX(bc.BrkCl) AS close,
    i.InDt AS install,
    IFNULL(TIMESTAMPDIFF(SECOND, i.InDt, MAX(bc.BrkCl)) / 3600, 0) AS uptime_hours,
    ROUND(
        (1 - SUM(CASE WHEN bc.BrkSt != '00' THEN TIMESTAMPDIFF(SECOND, bc.BrkOp, bc.BrkCl) ELSE 0 END) 
        / TIMESTAMPDIFF(SECOND, MIN(i.InDt), :end)) * 100, 2
    ) AS breakdown_percentage
FROM 
    installation i
LEFT JOIN 
    brkcases bc ON i.InM = bc.BrkM
WHERE 
    i.InDt <= :end
    AND (
        (bc.BrkOp BETWEEN :std AND :end) 
        OR (bc.BrkCl BETWEEN :std AND :end) 
        OR (bc.BrkOp IS NULL AND i.InDt <= :end)
    )
GROUP BY 
    i.InId, i.InDt;";
     $stmt = $pdo->prepare($sql);
     $stmt->bindParam(":std", $std);
     $stmt->bindParam(":end", $end);
     $stmt->execute();
 
     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $output = "";
     $output .= '<table class="table table-bordered" id="sec21-history">
    <thead class="thead-dark align-middle">
        <!-- table head -->
        <tr>
            <th scope="col" class="text-center">Uptime</th>
            <th scope="col">Breakdown Percentage</th>
            
        </tr>

    </thead>
    <tbody>
  ';
  if (count($data) > 0) {

    foreach ($data as $row) {
        $output .= "<tr>
                    <td scope='row' class='text-center'>{$row["uptime_hours"]}</td>
                    <td>{$row["breakdown_percentage"]}</td>
                    </tr>";
    }
    $output .= "</tbody></table>";
}
echo $output;
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}   
?>
