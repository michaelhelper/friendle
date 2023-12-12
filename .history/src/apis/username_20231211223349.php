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
    $user_id = $_COOKIE['user_id'];
    // query to get the username
    $query = "SELECT username FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    