<?php
// echo "alert('You have been signed out!');";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_COOKIE['user'])) {
        unset($_COOKIE['user']);
        
        echo 'success';
    } else {
        'failure';
    }
}
?>
