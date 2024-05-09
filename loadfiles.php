<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $filecat = $_GET["file_cat_selected"];
    $fileyear = $_GET["file_year_selected"];
    $db_host = "172.19.22.2";
    $db_user = "eandt";
    $db_pass = "2D*9Kr6EAvBW]f8F";
    $db_name = "files_eandt";
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Using prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, filename, filedesc FROM files WHERE filecat = ? AND YEAR(uplaod_date) = ?");
    $stmt->bind_param("si", $filecat, $fileyear);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $output = "";
        while ($row = $result->fetch_assoc()) {
            // Sanitize output to prevent XSS
            $id = htmlspecialchars($row["id"]);
            $filedesc = htmlspecialchars($row["filedesc"]);
            $output .= "<div class='row bg-white mb-3 p-1 rounded shadow border border-dark'>
                <div class='col-lg-2  blacked text-white d-flex align-items-center justify-content-center'>
                    <h5 class='text-center'>$id</h5>
                </div>
                <div class='col-lg-7 border-right border-md-1 d-flex align-items-center p-2'>
                    <p style='margin-bottom:0;'>$filedesc</p>
                </div>
                <div class='col-lg-3 d-flex align-items-center justify-content-center p-2'>
                    <p style='margin-bottom:0;'><a href='uploads/{$row["filename"]}' class='btn btn-dark blacked' download>Download</a></p>
                </div>
            </div>";
        }
        echo $output;
    } else {
        echo 'No files found.';
    }

    $stmt->close(); // Close statement
    $conn->close(); // Close connection
} else {
    echo 'Invalid request';
}
?>
