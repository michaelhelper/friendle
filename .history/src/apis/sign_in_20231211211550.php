<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
  // Get the user's entered username and password
  $username = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];

  // Query the users database to get the user's hashed password
  $query = "SELECT id, password FROM users WHERE username = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result) {
    // Fetch the password from the result
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['password'];

    // Verify if the entered password matches the stored hashed password
    if (password_verify($password, $hashedPassword)) {
      // Password is correct, set a cookie with the user id
      if (isset($row['id'])) {
        $userId = $row['id'];
        setcookie('user_id', $userId, time() + (86400 * 30), '/'); // Cookie expires in 30 days
        header('Location: /FRIENDLE/src/home');
      } else {
        echo "Invalid username or password";
      }
    }
    else {
      // Password is incorrect, show an error message
      echo "Invalid username or password";
    }
  } else {
    // Error occurred while querying the database
    echo "Error: " . $stmt->error;
  }                      
}
else {
}
?>
