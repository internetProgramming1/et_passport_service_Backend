<?php
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../../Config/db.php';

class AuthController {
    private $userModel;
    public function __construct() {
        $pdo = getDatabaseConnection();
        $this->userModel = new User($pdo);
    }
    public function signup() {
        header("Content-Type: application/json");
        $data = json_decode(file_get_contents('php://input'), true);
        $firstName = $data['firstName'] ?? '';
        $fatherName = $data['fatherName'] ?? '';
        $grandfatherName = $data['grandfatherName'] ?? '';
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        $confirmPassword = $data['confirmPassword'] ?? '';
        if (empty($firstName) || empty($fatherName) || empty($grandfatherName) || empty($email) || empty($password) || empty($confirmPassword)) {
            echo json_encode(["success" => false, "message" => "All fields are required."]); exit;
        }
        if ($password !== $confirmPassword) {
            echo json_encode(["success" => false, "message" => "Passwords do not match."]); exit;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["success" => false, "message" => "Invalid email format."]); exit;
        }
        if ($this->userModel->findByEmail($email)) {
            echo json_encode(["success" => false, "message" => "Email is already taken."]); exit;
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->userModel->create($firstName, $fatherName, $grandfatherName, $email, $hashedPassword);
        echo json_encode(["success" => true, "message" => "Registration successful!"]);
    }
    public function login() {
        header("Content-Type: application/json");
        $data = json_decode(file_get_contents('php://input'), true);
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        if (empty($email) || empty($password)) {
            echo json_encode(["success" => false, "message" => "Email and password are required."]); exit;
        }
        $user = $this->userModel->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid email or password"]);
        }
    }
}