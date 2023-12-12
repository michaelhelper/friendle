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
    // get the friend requests where friend_id is the user_id and is_friend is 0
    $query = "SELECT * FROM friends WHERE friend_id = ? AND is_friend = 0";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        $friend_requests = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $friend_request = array(
                "friend_id" => $row['friend_id']
            );
            array_push($friend_requests, $friend_request);
        }
        
    } else {
        echo "Error: " . $stmt->error;
    }

}