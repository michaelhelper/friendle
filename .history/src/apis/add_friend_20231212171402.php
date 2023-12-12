<?php
$host = "localhost";
$dbname = "friendle";
$username = "root";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check the connection
    if ($conn->connect_error) {
      die("Database connection failed: " . $conn->connect_error);
    }
    $friend = mysqli_real_escape_string($conn, $_POST['friend']);
    // check if the friend is in the database and get their id
    $check_query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $friend);
    $stmt->execute();
    $check_result = $stmt->get_result();
    if ($check_result->num_rows == 0) {
        echo "Friend not found";
        exit;
    }
    $row = mysqli_fetch_assoc($check_result);
    $friend_id = $row['id'];
    $user_id = $_COOKIE['user_id'];
    // check if the friend is already in the friends table
    $check_query = "SELECT * FROM friends WHERE user_id = ? AND friend_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $friend_id);
    $stmt->execute();
    $check_result = $stmt->get_result();
    if ($check_result->num_rows > 0) {
        echo "Friend already added";
        exit;
    }
    $query = "INSERT INTO friends (user_id, friend_id) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $friend_id);
    $result = $stmt->execute();
    if ($result) {
        // add a new 
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>