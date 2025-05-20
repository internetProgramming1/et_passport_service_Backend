<?php
require_once __DIR__ . '/../Src/Controllers/AuthController.php';

$authController = new AuthController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/auth/signup' && $method === 'POST') {
    $authController->signup();
} elseif ($uri === '/auth/login' && $method === 'POST') {
    $authController->login();
} else {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Not Found']);
}