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
    $dotenv->required(['DB_HOST', 'DB_DATABASE', 'DB_USERNAME']); // Adjusted to your env variables
} catch (Exception $e) {
    die('Environment configuration error: ' . $e->getMessage());
}

// Base path where your app lives relative to localhost root
$basePath = '/project/et_passport_service_Backend/Public';

// Get the full request URI
$uri = $_SERVER['REQUEST_URI'];

// Remove base path to get relative URI
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

try {
    switch ($uri) {
      case '/':
case '':
    include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
    echo <<<HTML
    <main style="text-align:center; margin-top:100px;">
        <h1>Welcome to the Passport Service</h1>
        <p>Please choose your login type:</p>
        <a href="/project/et_passport_service_Backend/Public/admin/login" 
           style="display:inline-block; margin: 15px; padding: 10px 20px; 
           background-color:#007BFF; color:#fff; text-decoration:none; border-radius:5px;">
           Admin Login
        </a>
        <a href="/project/et_passport_service_Backend/Public/customer/login" 
           style="display:inline-block; margin: 15px; padding: 10px 20px; 
           background-color:#28A745; color:#fff; text-decoration:none; border-radius:5px;">
           Customer Login
        </a>
    </main>
HTML;
    include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
    break;
  case '/':
        case '':
            include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
            echo "<main style='text-align:center; margin-top: 100px;'><h1>Welcome to the Passport Service</h1></main>";
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
            if (empty($_SESSION['admin_id'])) {
                header('Location: /project/et_passport_service_Backend/Public/admin/login');
                exit;
            }
            (new DashboardController())->index();
            break;

        default:
            http_response_code(404);
            include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
            echo '<main style="text-align:center; margin-top: 100px;"><h1>404 - Page Not Found</h1></main>';
            include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
            break;
    }
} catch (Throwable $e) {
    http_response_code(500);
    error_log('Application Error: ' . $e->getMessage());
    include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
    echo '<main style="text-align:center; margin-top: 100px;"><h1>500 - Server Error</h1>';
    if ($_ENV['APP_ENV'] === 'development') {
        echo '<pre>' . htmlspecialchars($e->getMessage()) . '</pre>';
    }
    echo '</main>';
    include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
}
