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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Perform any necessary validation on the input values
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill out all fields";
        exit;
    }

    // Verify that the email is a valid email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
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

    // Insert the data into the database
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $email, $password);
    $result = $stmt->execute();
    // create a new table for the user to store their friends name usernam + friends
    $friends_table_name = $username . "_friends";
    // it should have a column for the friends username and a boolean for if they are friends as well as an auto incrementing id
    $create_friends_table_query = "CREATE TABLE $friends_table_name (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, friend_username VARCHAR(30) NOT NULL, friend_status BOOLEAN NOT NULL)";
    $create_friends_table_result = $conn->query($create_friends_table_query);
    // create a table for users to 


    if ($result) {
        // return success
        echo "success";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
