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
    $unit = isset($_GET['unit']) ? $_GET['unit'] : null;
    $dept = isset($_GET['dept']) ? $_GET['dept'] : null;
    $keyy = isset($_GET['key']) ? $_GET['key'] : null;
    $sql = "SELECT 
        i.InL AS Loc,
        i.InM AS Machine,
        i.InN AS InName,
        d.DmName AS DepartmentName,
        i.ipv4 AS ipAdd
        FROM 
        (SELECT * FROM installation 
         WHERE
        (COALESCE(:sub, '') = '' OR InS = :sub) AND
        (COALESCE(:unit, '') = '' OR InU = :unit) AND 
        (COALESCE(:dept, '') = '' OR InD = :dept) AND
        (COALESCE(:keyy, '') = '' OR InC = :keyy) AND
        ipv4 != '' ORDER BY INET_ATON(ipv4)
        )i
        JOIN 
            units u ON i.InU = u.UnCode
        JOIN 
            subproduct s ON i.InS = s.SpId
        JOIN
            departments d ON i.InD = d.DmCode;
       
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":sub", $sub);
    $stmt->bindParam(":unit", $unit);
    $stmt->bindParam(":dept", $dept);
    $stmt->bindParam(":keyy", $keyy);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $output = "";
    $output .= '<table class="table table-bordered" id="down-ipv4">
    <thead class="thead-dark sticky-header">
        <tr>
        <th scope="col">IP Address</th>
        <th scope="col">Sl.Number</th>
        <th scope="col">Name</th>
        <th scope="col">Location</th>
        <th scope="col">Department</th>
        </tr>
    </thead>
    <tbody>';
    if (count($data) > 0) {

        foreach ($data as $row) {
            $output .= "<tr>
                        <td>{$row["ipAdd"]}</td>
                        <td>{$row["Machine"]}</td>
                        <td>{$row["InName"]}</td>
                        <td>{$row["Loc"]}</td>
                        <td>{$row["DepartmentName"]}</td>
                        </tr>";
        }
        $output .= "</tbody></table>";
    }
    echo $output;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
