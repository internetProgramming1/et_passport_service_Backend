<?php
$username = "root";
$password = "";
$host = "localhost";
$db = "Project_et_passport_db"; 

try {
    // Remove spaces around '=' in the DSN string
    $conn = new PDO("mysql:host=$host;dbname=$db; charset=utf8", $username, $password);
    
    // Fixed syntax for setAttribute (removed extra parentheses)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Confirm connection (debug only)
    // echo "Connected successfully!";
} catch(PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    die("A database error occurred. Please try later.");
}
?>