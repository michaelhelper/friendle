<?php
if ($data['action'] === 'POST') {
    if (isset($_COOKIE['user'])) {
        echo "al"
        unset($_COOKIE['user']);
        setcookie('user', '', time() - 900000000, '/');
        echo 'success';
    } else {
        'failure';
    }
}
?>