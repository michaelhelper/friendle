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
    $action = mysqli_real_escape_string($conn, $_POST['action']);
    $user_id = $_COOKIE['user_id'];
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
    if ($action == "accept") {
        // update the friends table to set is_friend to 1
        $query = "UPDATE friends SET is_friend = 1 WHERE user_id = ? AND friend_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $friend_id, $user_id);
        $result = $stmt->execute();
        if ($result) {
            // return success
            echo "success";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    } else if ($action == "deny") {
        // delete the friend request from the friends table
        $query = "DELETE FROM friends WHERE user_id = ? AND friend_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $friend_id, $user_id);
        $result = $stmt->execute();
        if ($result) {
            // return success
            // echo "success";
            
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    else {
        echo "Invalid action";
    }
}