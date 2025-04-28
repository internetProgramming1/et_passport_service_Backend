<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to database
$host = "localhost";
$username = "root"; 
$password = "";     
$dbname = "project_et_passport_db";


$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed."]));
}

// Receive JSON data
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "No data received."]);
    exit();
}

$email = $conn->real_escape_string($data['email']);
$password = $data['password']; 

// Find user
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $user['password'])) {
        echo json_encode(["status" => "success", "message" => "Login successful."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid password."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found."]);
}

$conn->close();
?>
