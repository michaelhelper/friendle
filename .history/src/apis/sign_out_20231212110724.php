<?php
if ($data['action'] === 'POST') {
    if (isset($_COOKIE['user'])) {
        unset($_COOKIE['user']);
        setcookie('user', '', time() - 3600000, '/');
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
