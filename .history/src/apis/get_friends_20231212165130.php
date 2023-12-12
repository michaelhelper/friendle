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