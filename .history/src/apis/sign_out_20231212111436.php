<?php
// echo "alert('You have been signed out!');";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "alert('You have been signed out!');";
    if (isset($_COOKIE['user'])) {
        echo "alert('You are already signed in!');";
        unset($_COOKIE['user']);
        setcookie('user', '', time() - 900000000, '/');
        echo 'success';
    } else {
        'failure';
    }
}
?>
