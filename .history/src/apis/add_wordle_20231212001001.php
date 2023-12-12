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
    $wordle = mysqli_real_escape_string($conn, $_POST['wordle']);
    $wordle_number = mysqli_real_escape_string($conn, $_POST['wordle_number']);
    $wordle_score = mysqli_real_escape_string($conn, $_POST['wordle_score']);
    $user_
