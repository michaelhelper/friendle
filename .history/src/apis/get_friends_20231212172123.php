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
    // get the friends where user_id is the user_id and is_friend is 1
    $query = "SELECT * FROM friends WHERE user_id = ? AND is_friend = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        // get the usernames of the friends
        $friends = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $query = "SELECT username FROM users WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $row['friend_id']);
            $stmt->execute();
            $username_result = $stmt->get_result();
            $username_row = mysqli_fetch_assoc($username_result);
            $username = $username_row['username'];
            $friend = array(
                "friend_id" => $row['friend_id'],
                "username" => $username
            );
            //get the wordle data 
            array_push($friends, $friend);
        }
        echo json_encode($friends);
    } else {
        echo "Error: " . $stmt->error;
    }
}