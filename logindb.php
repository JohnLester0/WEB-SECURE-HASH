<?php


declare(strict_types=1);

session_start();require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed.');
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    http_response_code(400);
    exit('Please enter your email and password.');
}

if (strlen($email) > 255 || !is_string($password)) {
    http_response_code(400);	
    exit('Invalid request.');
}

$stmt = $conn->prepare('SELECT id, fullname, password FROM users WHERE email = ? LIMIT 1');
if (!$stmt) {
    http_response_code(500);
    exit('Unable to sign in right now.');
}

$stmt->bind_param('s', $email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user || !password_verify($password, $user['password'])) {
    http_response_code(401);
    header('Location: invalid.php');
    exit;
}

session_regenerate_id(true);
$_SESSION['user_id'] = (int) $user['id'];
$_SESSION['fullname'] = $user['fullname'];

header('Location: Welcome.php');
exit;