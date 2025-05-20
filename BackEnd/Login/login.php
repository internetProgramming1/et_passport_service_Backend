<?php
require 'db_connect.php';

// Set response header as JSON
header("Content-Type: application/json");

try {
    
    // Get POST data
    $data = json_decode(file_get_contents('php://input'), true);

    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(["error" => "Email and password are required."]);
        exit;
    }

    // Prepare SQL query
    $stmt = $pdo->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        echo json_encode(["success" => true]);
    } else {
        // Invalid credentials
        echo json_encode(["success" => false, "message" => "Invalid email or password"]);
    }
} catch (PDOException $e) {
    // Database error
    echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
}
?>