<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include "connection.php";

    try {
        $serialNumber = isset($_GET['serialNumber']) ? htmlspecialchars($_GET['serialNumber']) : null;
        $stmt = $pdo->prepare("SELECT installation.*,
        (SELECT UnName FROM units WHERE UnCode = installation.InU) AS InUN,
        (SELECT DmName FROM departments WHERE DmCode = installation.InD) AS InDN,  
        (SELECT Name FROM products WHERE ID = installation.InC) AS InCN,
        (SELECT SpName FROM subproduct WHERE SpId = installation.InS) AS InSN,
        (SELECT make FROM productmake WHERE MakeID = installation.InMk) AS InMkN,
        (SELECT ModelName FROM productmodel WHERE ModelID = installation.InMl) AS InMlN
        FROM installation WHERE installation.InM = :serialNumber;");
        
        $stmt->bindParam(':serialNumber', $serialNumber, PDO::PARAM_STR);
        $stmt->execute();
    
       
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

            

        header('Content-Type: application/json');
        echo json_encode($data);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo 'Invalid request';
}
?>