<?php
// FILEPATH: /Applications/XAMPP/xamppfiles/htdocs/friendle/src/apis/sign_up.php

// Assuming you have a database connection established
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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Perform any necessary validation on the input values
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill out all fields";
        exit;
    }

    // Check if the username or email is already in use
    $check_query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $check_result = $stmt->get_result();
    if ($check_result->num_rows > 0) {
        echo "Username or email already in use";
        exit;
    }
    // make sure the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email";
        exit;
    }
    // Insert the data into the database
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $email, $password);
    $result = $stmt->execute();

    if ($result) {
        // Get the id of the newly inserted user
        $userId = $conn->insert_id;

        // Create the wordles table
        $wordles_table_name = 'user_' . $userId . '_wordles';
        $create_wordles_table_query = "CREATE TABLE $wordles_table_name (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            wordle_number INT NOT NULL,
            wordle_name VARCHAR NOT NULL
        )";
        if ($conn->query($create_wordles_table_query) === TRUE) {
            
        }
        

        // Create the friends table
        $friends_table_name = 'user_' . $userId . '_friends';
        $create_friends_table_query = "CREATE TABLE $friends_table_name (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            friend_username INT NOT NULL,
            is_friend BOOLEAN NOT NULL
        )";
        if ($conn->query($create_friends_table_query) !== TRUE) {
            echo "Error creating table: " . $conn->error;
        }

        // return success
        echo "success";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

