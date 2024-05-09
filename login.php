<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if (validateUser($pdo,$username, $password)) {
        // Update last_login timestamp in the database
        // updateLastLogin($username);

        // Set session variables
        $_SESSION['username'] = $username;

        echo '1';
    } else {
       echo 'Invalid username or password';
    }
} else {
    echo 'Invalid request';
}

function validateUser($pdo, $username, $password) {
    $query = "SELECT * FROM users WHERE username = ?";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && ($password==$user['password_hash'])) {
        
        return true;
    }
    return false;
}
// function updateLastLogin($username) {
//     // Implement code to update the last_login timestamp in the database
//     // For example, you can execute a SQL UPDATE query
// }


?>

