<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file_cat = $_POST["filecat"];
    $file_remark = $_POST["fileremark"];

    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/";
        $file_name = uniqid('', true) . '_' . basename($_FILES["file"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");

        if (!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } elseif ($_FILES["file"]["size"] > 5242880) { // 5 MB (size in bytes)
            echo "Sorry, your file is too large. It should be less than 5 MB.";
        } elseif (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $filename = $file_name;
            $filesize = $_FILES["file"]["size"];
            $filetype = $_FILES["file"]["type"];

            $db_host = "172.19.22.2";
            $db_user = "eandt";
            $db_pass = "2D*9Kr6EAvBW]f8F";
            $db_name = "files_eandt";

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO files (filename, filesize, filetype, filecat, filedesc) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sisss", $filename, $filesize, $filetype, $file_cat, $file_remark);

            if ($stmt->execute()) {
                echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded and the information has been stored in the database.";
            } else {
                echo "Sorry, there was an error uploading your file and storing information in the database.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>
