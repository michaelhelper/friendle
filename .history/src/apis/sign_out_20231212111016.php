<?php
if ($$_SERVER['REQUEST_METHOD'] === 'POST') {
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
