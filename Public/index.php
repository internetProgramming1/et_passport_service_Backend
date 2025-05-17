<?php
// Start session
session_start();

// Autoload dependencies
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Admin\Controllers\LoginController;
use Admin\Controllers\DashboardController;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Get path
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Simple router
switch ($uri) {
    case '/':
        include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
        echo "<h1>Welcome to the Homepage</h1>";
        include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
        break;

    case '/admin/login':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            (new LoginController())->showLoginForm();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new LoginController())->login();
        }
        break;

    case '/admin/logout':
        (new LoginController())->logout();
        break;

    case '/admin/dashboard':
        (new DashboardController())->index();
        break;

    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
