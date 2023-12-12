<?php
$host = "localhost";
$dbname = "friendle";
$username = "root";
$password = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_COOKIE['username'] = 'test';
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check the connection
    if ($conn->connect_error) {
      die("Database connection failed: " . $conn->connect_error);
    }
    $username = mysqli_real_escape_string($conn, $_COOKIE['username']);
    $wordle_number = mysqli_real_escape_string($conn, $_POST['wordle_number']);