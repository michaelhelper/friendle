<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
if ($data['action'] === 'logout') {
    if (isset($_COOKIE['user'])) {
        unset($_COOKIE['user']);
        setcookie('user', '', time() - 3600, '/');
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
