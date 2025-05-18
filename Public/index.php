<?php
// Start session with secure settings
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
    $dotenv->required(['DB_HOST', 'DB_DATABASE', 'DB_USERNAME']);
} catch (Exception $e) {
    die('Environment configuration error: ' . $e->getMessage());
}

// Base path configuration
$basePath = '/project/et_passport_service_Backend/Public';

// Get the request URI and normalize it
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove base path if present
if (strpos($requestUri, $basePath) === 0) {
    $requestUri = substr($requestUri, strlen($basePath));
}

// Ensure empty path becomes root
if ($requestUri === '') {
    $requestUri = '/';
}

// Router
try {
    switch ($requestUri) {
        case '/':
            include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
            echo <<<HTML
            <main style="text-align:center; margin-top:100px;">
                <h1>Welcome to the Passport Service</h1>
                <p>Please choose your login type:</p>
                <a href="$basePath/admin/login" 
                   style="display:inline-block; margin:15px; padding:10px 20px; 
                   background-color:#007BFF; color:#fff; text-decoration:none; border-radius:5px;">
                   Admin Login
                </a>
                <a href="$basePath/customer/login" 
                   style="display:inline-block; margin:15px; padding:10px 20px; 
                   background-color:#28A745; color:#fff; text-decoration:none; border-radius:5px;">
                   Customer Login
                </a>
            </main>
HTML;
            include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
            break;

        case '/admin/login':
            $controller = new LoginController();
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $controller->showLoginForm();
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->login();
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
                header("Location: $basePath/admin/login");
                exit;
            }
            (new DashboardController())->index();
            break;

        // ✅ NEW ROUTES ADDED HERE
        case '/customer/dashboard':
            (new \Admin\Controllers\CustomerDashboardController())->index();
            break;

        case '/admin/new':
            (new \Admin\Controllers\NewApplicationController())->index();
            break;

        case '/admin/renewal':
            (new \Admin\Controllers\RenewalApplicationController())->index();
            break;

        case '/admin/lost':
            (new \Admin\Controllers\LostApplicationController())->index();
            break;

        case '/admin/correction':
            (new \Admin\Controllers\CorrectionController())->index();
            break;

        case '/admin/status':
            (new \Admin\Controllers\ApplicationStatusController())->index();
            break;

        default:
            http_response_code(404);
            include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
            echo <<<HTML
            <main style="text-align:center; margin-top:100px;">
                <h1>404 - Page Not Found</h1>
                <p>The requested URL was not found on this server.</p>
                <a href="$basePath/" style="color:#007BFF;">Return to Homepage</a>
            </main>
HTML;
            include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
            break;
    }
} catch (Throwable $e) {
    http_response_code(500);
    error_log('Application Error: ' . $e->getMessage());
    include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
    echo <<<HTML
    <main style="text-align:center; margin-top:100px;">
        <h1>500 - Server Error</h1>
HTML;
    if ($_ENV['APP_ENV'] === 'development') {
        echo '<pre style="text-align:left; max-width:800px; margin:20px auto; padding:20px; background:#f8f9fa;">' 
             . htmlspecialchars($e->getMessage()) . '</pre>';
    }
    echo <<<HTML
        <a href="$basePath/" style="color:#007BFF;">Return to Homepage</a>
    </main>
HTML;
    include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
}
