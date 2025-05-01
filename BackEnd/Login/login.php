<?php
require 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["name"] = $user["first_name"];
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials.";
    }
} else {
    echo "Invalid request.";
}
?>
