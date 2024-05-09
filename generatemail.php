<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $targetID = $_POST["targetID"];
    try {
        $stmt = $pdo->prepare("SELECT 
        installation.*,
        (SELECT UnName FROM units WHERE UnCode = installation.InU) AS InUN,
        (SELECT DmName FROM departments WHERE DmCode = installation.InD) AS InDN,  
        (SELECT Name FROM products WHERE ID = installation.InC) AS InCN,
        (SELECT SpName FROM subproduct WHERE SpId = installation.InS) AS InSN,
        (SELECT make FROM productmake WHERE MakeID = installation.InMk) AS InMkN,
        (SELECT ModelName FROM productmodel WHERE ModelID = installation.InMl) AS InMlN,
        brk.*
    FROM 
        installation,
        brkcases brk
    WHERE 
        installation.InM = brk.BrkM
        AND (brk.BrkId = ? )");
        $stmt->bindParam(1, $targetID);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $output = "";
        if(count($data) > 0) {
            foreach($data as $row) {
                
                    $output .= '<p>Dear Team,</p>
                    <p>This device is gone under breakdown whose details are mentioned below</p>
                    <p class = "text-primary"><u>Product Information:-</u></p>';
                    $output .= "<p>Make : {$row["InMkN"]}<br>Model : {$row["InMlN"]}<br>SL No : {$row["InM"]}</p>

                    <p class = 'text-primary'><u>Problem:-</u></p>

                    <p>{$row["BrkPb"]}</p>
                    

                    <p class = 'text-primary'><u>User Details:-</u></p>

                    <p>User Name: {$row["InN"]}
                    <br>
                    Contact No: {$row["InP"]}
                    </p>

                    <p class = 'text-primary'><u>Address:-</u></p>
                    <p>{$row["InL"]} , {$row["InDN"]} , {$row["InUN"]}
                    <br>
                    PO- DERA<br>
                    CITY- TALCHER<br>
                    DIST- ANGUL<br>
                    STATE- ODISHA<br>
                    PIN-759103
                    </p>";
            }
        }
        echo $output;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo 'Invalid request';
}
?>