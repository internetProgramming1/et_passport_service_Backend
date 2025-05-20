<?php
require 'db_connect.php';

// Set response header as JSON
header("Content-Type: application/json");

try {
    
    // Get POST data
    $data = json_decode(file_get_contents('php://input'), true);
    

    $firstName = $data['firstName'] ?? '';
    $fatherName = $data['fatherName'] ?? '';
    $grandfatherName = $data['grandfatherName'] ?? '';
    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';
    $confirmPassword = $data['confirmPassword'] ?? '';
    // Basic validation
    if (empty($firstName) || empty($fatherName) || empty($grandfatherName) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }
    if ($password !== $confirmPassword) {
        echo json_encode(["success" => false, "message" => "Passwords do not match."]);
        exit;
    }
    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email format."]);
        exit;
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        echo json_encode(["success" => false, "message" => "Email is already taken."]);
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $stmt = $pdo->prepare("INSERT INTO users (firstname, fathername, grandfathername, email, password)
                           VALUES (?, ?, ?, ?, ?)");
    
    $stmt->execute([$firstName, $fatherName, $grandfatherName, $email, $hashedPassword]);

    // Success response
    echo json_encode(["success" => true, "message" => "Registration successful!"]);

} catch (PDOException $e) {
    // Database error
    echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
}
?>