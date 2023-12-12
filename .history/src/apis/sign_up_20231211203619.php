<?php

// Assuming you have a database connection established
$host = "localhost";
$dbname = "friendle";
$username = "root";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "POST";
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check the connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform any necessary validation on the input values

    // Check if username or email already exists
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query);
    echo 
    if (mysqli_num_rows($result) > 0) {
        // Display error to the user
        echo "Username or email already exists";
    } else {
        // Insert the data into the database
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect to login page
            header('Location: ../sign_in');
            exit;
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
}
?>
