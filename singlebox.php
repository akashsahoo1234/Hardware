<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include "connection.php";
    $targetID = $_GET["targetID"];
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
                $output .= "<div class='col-lg-8 border-right border-md-1'>
                    <p id='home-inst-pr' class='mt-2'>
                    <span class='bg-primary text-white p-2 rounded-left'>{$row["InSN"]}</span><span class='bg-success text-white p-2 rounded-right'>{$row["BrkM"]}</span>
                    <br><br>{$row["InMkN"]} :: {$row["InMlN"]}
                    </p>
                    <p id='home-inst-loc'>{$row["InUN"]} | {$row["InDN"]} | {$row["InL"]}</p>
                    <span>
                        <button type='button' class='btn font-weight-bold mb-2 repair-box-btn btn-outline-info' data-id='{$row["BrkId"]}'>Repair information</button>
                    </span>
                    
                </div>
                <div class='col-lg-4 d-flex align-items-center justify-content-center font-weight-bold'>
                    <div class='row'>
                    <div class='col-12'>
                    <h6 class='text-white bg-danger rounded shadow p-2 text-center '>{$row["BrkRg"]}</h6>
                    </div>
                    <div class='col-12'>
                    <h6 class='text-white bg-warning rounded shadow p-2 text-center'>{$row["BrkOp"]}</h6>
                    </div>
                    <div class='col-12'>
                    <h6 class='text-white bg-success rounded shadow p-2 text-center'>{$row["BrkCl"]}</h6>
                    </div>
                    </div>
            
                </div>
                <div id='box{$row["BrkId"]}' class='col-12'>
                    <div class='row m-3'>
                        <div class='col-12'>
                            <form>
                                <div class='form-row'>
                                    <div class='form-group col'>
                                        <label>Problem :</label>
                                        <textarea class='form-control font-weight-bold' rows='1' readonly>{$row["BrkPb"]}</textarea>
                                    </div>
                                </div>";
                                $lines = explode("\n", $row["BrkPr"]);
                                $progress = "";
                                foreach ($lines as $line):
                                    if($line!=""){
                                        $progress .= '- '.$line."\n";
                                    }     
                                endforeach;        

                        if($row["BrkSt"]!="00")
                        {
                            $output .= "<div class='form-row'>
                            <div class='form-group col'>
                                <label>Progress :</label>
                                <textarea class='form-control font-weight-bold' rows='4' readonly>$progress</textarea>
                            </div>
                            </div>";
                            $output .= "<div class='form-row'>
                            <div class='form-group col'>
                               <label>Add Progress :</label>
                               <textarea class='form-control add-progess-in' data-id='{$row["BrkId"]}' rows='1'></textarea>
                            </div>
                            </div>";
                        }

                        $output .= "<div class='form-row  pl-1'>";
                        if($row["BrkSt"]=="00")
                        {
                            $output  .= "<button type='button' class='btn btn-outline-success mr-2 a-open font-weight-bold' data-id='{$row["BrkId"]}'>Open Case</button>
                            <button type='button' class='btn btn-outline-warning mr-2 a-mail font-weight-bold' data-id='{$row["BrkId"]}'>Generate Mail</button>";
                        }
                        // else if($row["BrkSt"]=="10")
                        // {
                        //     $output  .= "<button type='button' class='btn btn-outline-dark mr-2 a-reopen font-weight-bold' data-id='{$row["BrkId"]}'>Reopen Case</button>
                        //     <button type='button' class='btn btn-outline-warning mr-2 a-mail font-weight-bold' data-id='{$row["BrkId"]}' data-toggle='modal'  data-target='#exampleModalCenter'>Generate Mail</button>";
                        // }
                        if($row["BrkSt"]=="01")
                        {
                            $output .= "<button type='button' class='btn btn-outline-primary mr-2 a-prgs font-weight-bold' data-id='{$row["BrkId"]}'>Add Progress</button>
                            <button type='button' class='btn btn-outline-danger mr-2 a-clse font-weight-bold' data-id='{$row["BrkId"]}'>Close Case</button>";
                        }

                        $output .= "<button class='btn btn-outline-info font-weight-bold ml-auto mr-1'>{$row["InN"]} - {$row["InP"]}</button>";              
                        $output .= "</div>
                                
                            </form>
                        </div>
                        
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