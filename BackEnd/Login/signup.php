<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$host = "localhost";
$username = "root";
$password = "";   
$dbname = "project_et_passport_db";


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed."]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "No data received."]);
    exit();
}


$firstName = $conn->real_escape_string($data['name']);
$fatherName = $conn->real_escape_string($data['fatherName']);
$grandfatherName = $conn->real_escape_string($data['grandfatherName']);
$email = $conn->real_escape_string($data['email']);
$password = $conn->real_escape_string($data['password']);


$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


$checkQuery = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Email already registered."]);
    exit();
}


$sql = "INSERT INTO users (first_name, father_name, grandfather_name, email, password) 
        VALUES ('$firstName', '$fatherName', '$grandfatherName', '$email', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Signup successful."]);
} else {
    echo json_encode(["status" => "error", "message" => "Signup failed."]);
}

$conn->close();
?>
