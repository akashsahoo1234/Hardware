<?php
session_start();

$dsn = 'mysql:host=localhost;dbname=eandt;port=3307;charset=utf8mb4';
$dbUsername = 'A95001601';
$dbPassword = ']LndlFoSv@nocZnP';
try {
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sub = isset($_GET['sub']) ? $_GET['sub'] : null;
    $make = isset($_GET['make']) ? $_GET['make'] : null;
    $model = isset($_GET['model']) ? $_GET['model'] : null;
    $unit = isset($_GET['unit']) ? $_GET['unit'] : null;
    $dept = isset($_GET['dept']) ? $_GET['dept'] : null;
    $keyy = isset($_GET['key']) ? $_GET['key'] : null;
    $sql = "SELECT 
        i.InId AS Id,
        i.InL AS Loc,
        i.InM AS Machine,
        m.ModelName AS ModelName,
        d.DmName AS DepartmentName,
        u.UnName AS UnitName,
        s.SpName AS SubName,
        ma.make AS MakeName
        FROM 
        (SELECT * FROM installation 
         WHERE
         (COALESCE(:sub, '') = '' OR InS = :sub) AND
        (COALESCE(:make, '') = '' OR InMk = :make) AND
        (COALESCE(:model, '') = '' OR InMl = :model) AND
        (COALESCE(:unit, '') = '' OR InU = :unit) AND 
        (COALESCE(:dept, '') = '' OR InD = :dept) AND
        (COALESCE(:keyy, '') = '' OR InC = :keyy)
        ) i
        JOIN 
            productmodel m ON i.InMl = m.ModelID
        JOIN 
            units u ON i.InU = u.UnCode
        JOIN 
            productmake ma ON i.InMk = ma.MakeID
        JOIN 
            subproduct s ON i.InS = s.SpId
        JOIN
            departments d ON i.InD = d.DmCode;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":sub", $sub);
    $stmt->bindParam(":make", $make);
    $stmt->bindParam(":model", $model);
    $stmt->bindParam(":unit", $unit);
    $stmt->bindParam(":dept", $dept);
    $stmt->bindParam(":keyy", $keyy);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $output = "";
    $output .= '<table class="table table-bordered" id="down-installation">
    <thead class="thead-dark sticky-header">
        <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col">Product</th>
        <th scope="col">Model</th>
        <th scope="col">Location</th>
        <th scope="col">Department</th>
        <th scope="col">Unit</th>
        <th scope="col">Sl.Number</th>

        </tr>
    </thead>
    <tbody>';
    if (count($data) > 0) {

        foreach ($data as $row) {
            $output .= "<tr>
                        <td scope='row' class='text-center'>{$row["Id"]}</td>
                        <td>{$row["SubName"]}</td>
                        <td>{$row["ModelName"]}</td>
                        <td>{$row["Loc"]}</td>
                        <td>{$row["DepartmentName"]}</td>
                        <td>{$row["UnitName"]}</td>
                        <td>{$row["Machine"]}</td>
                        </tr>";
        }
        $output .= "</tbody></table>";
    }
    echo $output;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
