<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_COOKIE['user_id'])) {
        // set the cookie to expire one hour ago
        setcookie('user_id', '', time() - 3600, '/');
        echo 'success';
    } else {
        echo 'failure';
    }
}
?>
