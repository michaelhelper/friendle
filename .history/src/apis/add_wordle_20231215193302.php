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
    $current_wordle
    $user_id = $_COOKIE['user_id'];
    // check if the wordle_number is already in use for this user
    $check_query = "SELECT * FROM wordles WHERE user_id = ? AND wordle_number = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $wordle_number);
    $stmt->execute();
    $check_result = $stmt->get_result();
    if ($check_result->num_rows > 0) {
        echo "Wordle already entered for that day";
        exit;
    }
    $query = "INSERT INTO wordles (user_id, wordle_number, wordle_score, wordle) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiss", $user_id, $wordle_number, $wordle_score, $wordle);
    $result = $stmt->execute();
    if ($result) {
        // return success
        echo "success";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>