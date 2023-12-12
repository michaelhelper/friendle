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
    $user_id = $_COOKIE['user_id'];
    // add the wordle to the database
    $query = "INSERT INTO wordles (user_id, wordle_number, wordle_score, wordle) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiss", $user_id, $wordle_number, $wordle_score, $wordle);