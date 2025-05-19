<?php

require_once __DIR__ . '/../src/Admin/Controllers/LoginController.php';
require_once __DIR__ . '/../src/Admin/Controllers/DashboardController.php';

require_once __DIR__ . '/../Src/Admin/Controllers/CorrectionController.php';
require_once __DIR__ . '/../Src/Admin/Controllers/NewApplicationController.php';
require_once __DIR__ . '/../src/Admin/Controllers/RenewalApplicationController.php';
require_once __DIR__ . '/../Src/Admin/Controllers/LostApplicationController.php';


require_once __DIR__ . '/../Src/Controllers/statusController.php';

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

// use Admin\Controllers\DashboardController;

// Load environment variables
try {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    $dotenv->required(['DB_HOST', 'DB_DATABASE', 'DB_USERNAME']);
} catch (Exception $e) {
    die('Environment configuration error: ' . $e->getMessage());
}

$request = $_SERVER['REQUEST_URI'];

// Normalize the request URI if needed
$request = strtok($request, '?'); // remove query strings if any

switch (true) {
    case str_starts_with($request, '/start-application'):
    case str_starts_with($request, '/standard'):
    case str_starts_with($request, '/urgent'):
        include __DIR__ . '/../Routes/formRoute.php';
        break;
}

// Base path configuration
$basePath = '/project/et_passport_service_Backend/Public';

// Get the request URI and normalize it
// $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$requestUri = $_SERVER['REQUEST_URI'];

// Remove base path if present
if (strpos($requestUri, $basePath) === 0) {
    $requestUri = substr($requestUri, strlen($basePath));
}

// Router
try {
    switch ($requestUri) {
        case '/login':
            include __DIR__ . '/../Src/Admin/Views/loginChoose.php';
            break;
        case '/home':
            include __DIR__ . '/../Src/Views/FrontPage/FronPage.php';
            break;
        case '/requirement':
            include __DIR__ . '/../Src/Views/FrontPage/requirement.php';
            break;
            break;
        case '/faqs':
            include __DIR__ . '/../Src/Views/FAQ/faq.php';
            break;
        case '/statusChecking':
            include __DIR__ . '/../Src/Views/FAQ/faq.php';
            break;

        case '/formController';
            include __DIR__ . '/../Src/Controllers/Appointment/formController.php';
            break;
        case '/formControllerUrgent';
            include __DIR__ . '/../Src/Controllers/Appointment/formControllerUrgent.php';
            break;


        case '/status/check':
            (new StatusController)->showForm();
        case '/status/result':
            (new StatusController)->checkStatus();



        case '/admin/login':
            $controller = new LoginController();
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $controller->showLoginForm();
                    break;

                case 'POST':
                    $controller->login();
                    break;

                default:
                    http_response_code(405);
                    require_once __DIR__ . '/../Src/Views/errors/405.php'; // Optional: custom 405 page
                    exit;
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

        case '/application/new':
            (new NewApplicationController())->index();
            break;
        case '/application/renewal':
            (new RenewalApplicationController())->index();
            break;
        case '/application/lost':
            (new LostApplicationController())->index();
            break;
        case '/application/correction':
            (new CorrectionController())->index();
            break;
            // default:
            //     http_response_code(404);
            //     include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
            //     echo <<<HTML
            //                 <main style="text-align:center; margin-top:100px;">
            //                     <h1>404 - Page Not Found</h1>
            //                     <p>The requested URL was not found on this server.</p>
            //                     <a href="$basePath/" style="color:#007BFF;">Return to Homepage</a>
            //                 </main>
            //     HTML;
            //     include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
            //     break;
    }
} catch (Throwable $e) {
    http_response_code(500);
    error_log('Application Error: ' . $e->getMessage());
    include __DIR__ . '/../FrontEnd/Head_Foot/header.html';
    echo "<h1>500 - Server Error</h1>";
    echo "<p>Error details:</p>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    if ($_ENV['APP_ENV'] === 'development') {
        echo '<pre style="text-align:left; max-width:800px; margin:20px auto; padding:20px; background:#f8f9fa;">'
            . htmlspecialchars($e->getMessage()) . '</pre>';
    }
    //     echo <<<HTML
    //         <a href="$basePath/" style="color:#007BFF;">Return to Homepage</a>
    //     </main>
    // HTML;
    //     include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
}
