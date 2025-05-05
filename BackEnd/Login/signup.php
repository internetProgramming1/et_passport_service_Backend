<?php
include 'db_connect.php';

// Get POST data from form
$name = $_POST['name'] ?? '';
$fatherName = $_POST['fatherName'] ?? '';
$grandfatherName = $_POST['grandfatherName'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';

// Validate fields
if (!$name || !$fatherName || !$grandfatherName || !$email || !$password || !$confirmPassword) {
    echo json_encode(['error' => 'All fields are required']);
    http_response_code(400);
    exit;
}

// Check if passwords match
if ($password !== $confirmPassword) {
    echo json_encode(['error' => 'Passwords do not match']);
    http_response_code(400);
    exit;
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch(PDO::FETCH_ASSOC)) {
    echo json_encode(['error' => 'Email already exists']);
    http_response_code(400);
    exit;
}

// Insert new user into the database
$stmt = $pdo->prepare("INSERT INTO users (name, fatherName, grandfatherName, email, password) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$name, $fatherName, $grandfatherName, $email, $hashedPassword]);

echo json_encode(['message' => 'Registration successful']);
?>
