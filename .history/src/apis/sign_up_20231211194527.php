<?php
// FILEPATH: /Applications/XAMPP/xamppfiles/htdocs/friendle/src/apis/sign_up.php

// Assuming you have a database connection established
// 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform any necessary validation on the input values

    // Insert the data into the database
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Sign up successful";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
