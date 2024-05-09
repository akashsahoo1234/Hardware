<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'logout') {
        // Unset all of the session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Return a success message or any other response as needed
        echo 'logout_success';
    } else {
        // Return an error message or any other response as needed
        echo 'logout_failed';
    }
} else {
    // Return an error message or any other response as needed
    echo 'invalid_request';
}
?>
