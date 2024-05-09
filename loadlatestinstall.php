 <?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include "connection.php";

    try {
        $stmt = $pdo->prepare("SELECT installation.*,
        (SELECT UnName FROM units WHERE UnCode = installation.InU) AS InUN,
        (SELECT DmName FROM departments WHERE DmCode = installation.InD) AS InDN,  
        (SELECT Name FROM products WHERE ID = installation.InC) AS InCN,
        (SELECT SpName FROM subproduct WHERE SpId = installation.InS) AS InSN,
        (SELECT make FROM productmake WHERE MakeID = installation.InMk) AS InMkN,
        (SELECT ModelName FROM productmodel WHERE ModelID = installation.InMl) AS InMlN
        FROM installation ORDER BY InId DESC LIMIT 10");

        $stmt->execute();
    
       
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $output = "";
        if(count($data) > 0) {
            foreach($data as $row) {
                $output .= '<div class="row bg-white mb-3 p-1 rounded shadow border border-dark">';
                $output .= '<div class="col-lg-8">';
                $output .= "<p id='home-inst-pr' class='mt-2'><span class='blacked text-white p-2 rounded-left'>{$row["InSN"]}</span><span class='bg-dark text-white p-2 rounded-right '>{$row["InM"]}</span><br><br>{$row["InMkN"]} :: {$row["InMlN"]}</p>";
                $output .= "<p id='home-inst-loc'>{$row["InUN"]} | {$row["InDN"]} | {$row["InL"]}</p></div>";
                $output .= "<div class='col-lg-4 d-flex align-items-center justify-content-center font-weight-bold'>
                <div class='row'><div class='col-12'>
                <h6 class='text-white bg-danger rounded shadow p-2 text-center '>{$row["InId"]}</h6></div>
                <div class='col-12'>
                <h6 class='text-white bg-info rounded shadow p-2 text-center'>{$row["InDt"]}</h6>
                </div></div></div>";
                $output .= "</div>";
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