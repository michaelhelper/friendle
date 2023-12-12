<?php
$host = "localhost";
$dbname = "friendle";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userId = $_COOKIE['user_id'];
    $query = "SELECT wordle_number, wordle_score, wordle FROM wordles WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        $wordles = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $wordle = array(
                "wordle_number" => $row['wordle_number'],
                "wordle_score" => $row['wordle_score'],
                "wordle" => $row['wordle']
            );
            array_push($wordles, $wordle);
        }
        echo json_encode($wordles);
    } else {
        echo "Error: " . $stmt->error;
    }
}