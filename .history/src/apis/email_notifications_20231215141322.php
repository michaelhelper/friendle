<?php
$host = "localhost";
$dbname = "friendle";
$username = "root";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check the connection
    if ($conn->connect_error) {
      die("Database connection failed: " . $conn->connect_error);
    }
    $user_id = $_COOKIE['user_id'];
    //get the friend id from the username
    $friend = mysqli_real_escape_string($conn, $_GET['friend']);
    $query = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $friend);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    $friend_id = $row['id'];
    $email_notifications = mysqli_real_escape_string($conn, $_GET['email_notifications']);
    // update the email_notifications column in the friends table
    $query = "UPDATE friends SET email_notifications = ? WHERE user_id = ? AND friend_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $email_notifications, $user_id, $friend_id);
    $result = $stmt->execute();
    if ($result) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }
    
}