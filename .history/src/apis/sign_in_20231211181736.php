<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  console_log("POST request received");
  // Assuming you have a database connection established
  $host = "localhost";
  $dbname = "friendle";
  $username = "root";
  $password = "";

  // Create a MySQLi connection
  $conn = new mysqli($host, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    console_log("Connection failed");
    die("Database connection failed: " . $conn->connect_error);
  }
  console_log("Connected successfully");
  // Get the user's entered username and password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the users database to get the user's hashed password
  $query = "SELECT password FROM users WHERE username = '$username'";
  $result = mysqli_query($connection, $query);

  if ($result) {
    // Fetch the password from the result
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['password'];

    // Generate the hashed password using the entered password
    $enteredPasswordHash = hash('sha256', $password);

    // Verify if the entered password matches the stored hashed password
    if ($hashedPassword === $enteredPasswordHash) {
      // Password is correct, set a cookie with the user id
      $userId = $row['id'];
      setcookie('user_id', $userId, time() + (86400 * 30), '/'); // Cookie expires in 30 days
      header('Location: /friendle/src/home');
    } else {
      // Password is incorrect, show an error message
      echo "Invalid username or password";
    }
  } else {
    // Error occurred while querying the database
    echo "Error: " . mysqli_error($connection);
  }
}
?>