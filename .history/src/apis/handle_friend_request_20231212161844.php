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
    $friend_id = mysqli_real_escape_string($conn, $_POST['friend_id']);
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
            echo "success";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    else {
        echo "Invalid action";
    }
}