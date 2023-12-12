<?php
// echo "alert('You have been signed out!');";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_COOKIE['user'])) {
        setcookie('user', '', time() - 900000000, '/');
        unset($_COOKIE['user']);
        echo 'success';
    } else {
        'failure';
    }
}
?>
