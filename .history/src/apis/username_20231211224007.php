<?php
// Assuming you have a database connection established
$host = "localhost";
$dbname = "friendle";
$username = "root";
$password = "";

// Create a MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user id from the cookie
    $userId = $_COOKIE['user_id'];
    // alert the cookie
    // Query the users database to get the username
    $query = "SELECT username FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        // Fetch the username from the result
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];

        // Output the username
        echo $username;
    } else {
        // Error occurred while querying the database
        echo "Error: " . $stmt->error;
    }
}
?>
