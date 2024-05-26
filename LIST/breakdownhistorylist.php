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
    $sql = "Select BrkId,BrkPb,BrkPr,TIMESTAMPDIFF(HOUR, BrkOp, BrkCl) AS time_difference from brkcases where BrkM = :slno AND BrkSt='10';";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":slno", $slno);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);



    $output = "";
    $output .= '<table class="table table-bordered" id="sec21-history">
    <thead class="thead-dark align-middle">
        <!-- table head -->
        <tr>
            <th scope="col" class="text-center">Breakdown Id</th>
            <th scope="col">Uptime</th>
            <th scope="col">Breakdown Percentage</th
        </tr>

    </thead>
    <tbody>
  ';
    if (count($data) > 0) {

        foreach ($data as $row) {
            $output .= "<tr>
     
            <td class='text-center align-middle'><h3>{$row["BrkId"]}</h3></td>
            <td class='align-middle'>{$row["BrkPb"]}</td>
            <td>";
            $lines = explode("\n", $row["BrkPr"]);
            foreach ($lines as $line) {
                if($line != "")
                $output .= "$line"."<br>";
            }
            $output .= "</td>";
            $output .= "<td class='text-center align-middle'>
                <h2>{$row["time_difference"]}</h2>
            </td></tr>";
                        
            
        }
        $output .= "</tbody></table>";
    }
    echo $output;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
