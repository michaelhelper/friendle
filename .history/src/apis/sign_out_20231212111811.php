<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_COOKIE['user'])) {
        // set the cookie to expire one hour ago
        setcookie('user', '', time() - 3600, '/');
        echo 'success';
    } else {
        echo 'failure';
    }
}
?>
