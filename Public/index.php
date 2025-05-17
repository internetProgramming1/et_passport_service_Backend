<?php

session_start([
    'cookie_lifetime' => 86400, 
    'cookie_secure' => true,    
    'cookie_httponly' => true,  
    'cookie_samesite' => 'Lax' 
]);

// Autoload dependencies
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

use Admin\Controllers\LoginController;
use Admin\Controllers\DashboardController;

// Load environment variables
try {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER']); // Add required env vars
} catch (Exception $e) {
    die('Environment configuration error: ' . $e->getMessage());
}

// Get path
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Simple router with better error handling
try {
    switch ($uri) {
        case '/':
            include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
            echo "<main><h1>Welcome to the Passport Service</h1></main>";
            include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
            break;

        case '/admin/login':
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                (new LoginController())->showLoginForm();
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                (new LoginController())->login();
            } else {
                http_response_code(405);
                die('Method Not Allowed');
            }
            break;

        case '/admin/logout':
            (new LoginController())->logout();
            break;

        case '/admin/dashboard':
            // Check if admin is logged in
            if (empty($_SESSION['admin_id'])) {
                header('Location: /admin/login');
                exit;
            }
            (new DashboardController())->index();
            break;

        default:
            http_response_code(404);
            include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
            echo '<main><h1>404 - Page Not Found</h1></main>';
            include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
            break;
    }
} catch (Throwable $e) {
    http_response_code(500);
    error_log('Application Error: ' . $e->getMessage());
    include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
    echo '<main><h1>500 - Server Error</h1>';
    if ($_ENV['APP_ENV'] === 'development') {
        echo '<pre>' . htmlspecialchars($e->getMessage()) . '</pre>';
    }
    echo '</main>';
    include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
}