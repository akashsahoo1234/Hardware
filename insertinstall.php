<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";

    $cat = $_POST['cat'];
    $pr = $_POST['pr'];
    $mk = $_POST['mk'];
    $ml = $_POST['ml'];
    $unit = $_POST['unit'];
    $dept = $_POST['dept'];
    $loc = $_POST['loc'];
    $amount = $_POST['amount'];
    $comp = $_POST['comp'];
    $name = $_POST['name'];
    $ph = $_POST['ph'];
    $sl = $_POST['sl'];
    $rk = $_POST['rk'];
    $by = $_POST['loggedUser'];
    $ip = $_POST['ip'];
    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("SELECT * FROM availability WHERE AvCat = ? AND AvPr = ? AND AvMake = ? AND AvModel = ? AND Amount >= ?");

        $stmt->bindParam(1, $cat);
        $stmt->bindParam(2, $pr);
        $stmt->bindParam(3, $mk);
        $stmt->bindParam(4, $ml);
        $stmt->bindParam(5, $amount, PDO::PARAM_INT);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $stmt2 = $pdo->prepare("INSERT INTO installation(InId,InU,InD,InL,InC,InS,InMk,InMl,InA,InM,InCo,InN,InP,InSt,InDt,InRk,InBy,ipv4) 
            VALUES (:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8, :value9, :value10, :value11, :value12, :value13, :value14, :value15, :value16, :value17, :value21)");

            $stmt2->bindParam(':value1', $value1);
            $stmt2->bindParam(':value2', $value2);
            $stmt2->bindParam(':value3', $value3);
            $stmt2->bindParam(':value4', $value4);
            $stmt2->bindParam(':value5', $value5);
            $stmt2->bindParam(':value6', $value6);
            $stmt2->bindParam(':value7', $value7);
            $stmt2->bindParam(':value8', $value8);
            $stmt2->bindParam(':value9', $value9);
            $stmt2->bindParam(':value10', $value10);
            $stmt2->bindParam(':value11', $value11);
            $stmt2->bindParam(':value12', $value12);
            $stmt2->bindParam(':value13', $value13);
            $stmt2->bindParam(':value14', $value14);
            $stmt2->bindParam(':value15', $value15);
            $stmt2->bindParam(':value16', $value16);
            $stmt2->bindParam(':value17', $value17);
            $stmt2->bindParam(':value21', $value21);

            $value1 = NULL;
            $value2 = $unit;
            $value3 = $dept;
            $value4 = $loc;
            $value5 = $cat;
            $value6 = $pr;
            $value7 = $mk;
            $value8 = $ml;
            $value9 = $amount;
            $value10 = $sl;
            $value11 = $comp;
            $value12 = $name;
            $value13 = $ph;
            $value14 = 'A';
            date_default_timezone_set('Asia/Kolkata');
            $dateTime = new DateTime('now');
            $formattedDateTime = $dateTime->format('Y-m-d H:i:s');
            $value15 = $formattedDateTime;
            $value16 = $rk;
            $value17 = $by;
            $value21 = $ip;

            $stmt2->execute();

            $newAmount = $row['Amount'] - $amount;

            $updateStmt = $pdo->prepare("UPDATE availability SET Amount = ? WHERE AvCat = ? AND AvPr = ? AND AvMake = ? AND AvModel = ?");
            $updateStmt->bindParam(1, $newAmount, PDO::PARAM_INT);
            $updateStmt->bindParam(2, $cat);
            $updateStmt->bindParam(3, $pr);
            $updateStmt->bindParam(4, $mk);
            $updateStmt->bindParam(5, $ml);
            $updateStmt->execute();

            $stmt3 = $pdo->prepare("INSERT INTO brkhours(BrhId,BrhM,Brh) VALUES (:value18,:value19,:value20)");
            $stmt3->bindParam(':value18', $value18);
            $stmt3->bindParam(':value19', $sl);
            $stmt3->bindParam(':value20', $value20);
            $value18 = NULL;
            $value20 = 0;
            $stmt3->execute();
            $pdo->commit();
            
            echo "Installed successfully!";
        } else {
            echo "This Product of Given Make and Model Does not exist or Available Quantity is less than the inserted Quantity";
        }
    } catch (PDOException $e) {
        // If an exception occurs, roll back the transaction
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
    
    // Close the connection
    $pdo = null;
    
} else {
    echo 'Invalid request';
}

?>