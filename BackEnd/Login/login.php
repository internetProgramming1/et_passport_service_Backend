<?php
session_start();
include 'db_connect.php';

// Get POST data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validate the email and password
if (!$email || !$password) {
    echo json_encode(['error' => 'Email and Password are required']);
    http_response_code(400);
    exit;
}

// Prepare the query to get the user's info
$stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user exists and verify password
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id']; // Store the user id in session
    echo json_encode(['message' => 'Login successful']);
} else {
    echo json_encode(['error' => 'Invalid email or password']);
    http_response_code(401);
}
?>

