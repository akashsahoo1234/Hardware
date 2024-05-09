<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include "connection.php";

    try {
        $AvPR = isset($_GET['subid']) ? htmlspecialchars($_GET['subid']) : null;
        $AvCAT = isset($_GET['AvCat']) ? htmlspecialchars($_GET['AvCat']) : null;
        $stmt = $pdo->prepare("SELECT availability.*,
        (SELECT make FROM productmake WHERE MakeID = availability.AvMake) AS MakeName,
        (SELECT ModelName FROM productmodel WHERE ModelID = availability.AvModel) AS ModelName,
        (SELECT SpName FROM subproduct WHERE SpId = availability.AvPr) AS ProductName 
        FROM availability WHERE(AvCat = ? AND (AvPr = ? OR ? = 0) )");
        if(!$AvPR)
        {
            $AvPR = 0 ;
        }
        $stmt->bindParam(1, $AvCAT);
        $stmt->bindParam(2, $AvPR);
        $stmt->bindParam(3, $AvPR);
        $stmt->execute();
    
       
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $output = "";
        if(count($data) > 0) {
            foreach($data as $row) {
                $output .= "<div class='row bg-white mb-3 p-1 rounded shadow border border-dark'>
                <div class='col-md-3  blacked text-white d-flex  align-items-center justify-content-center p-3 rounded'>
                    <h6 class='text-center font-weight-bold' id='home-avail-id '>{$row["ProductName"]}</h6>
                </div>
                <div class='col-md-7  d-flex  align-items-center p-3'>
                    <h6 class='align-items-center font-weight-bold' id='home-avail-id'>{$row["MakeName"]} :: {$row["ModelName"]}</h6>
                </div>
                <div class='col-md-2 blacked text-white d-flex align-items-center justify-content-center rounded-success'>
                    <h5 class='text-center font-weight-bold' id='home-avail-quant'>{$row["Amount"]}</h5>
                </div>
            </div>";
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