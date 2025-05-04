<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["name"];
    $fatherName = $_POST["fatherName"];
    $grandfatherName = $_POST["grandfatherName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first_name, father_name, grandfather_name, email, password) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$firstName, $fatherName, $grandfatherName, $email, $hashedPassword]);
        header("Location: login.html?success=1"); // Redirect after signup
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Email already registered.";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "Invalid request.";
}
?>
