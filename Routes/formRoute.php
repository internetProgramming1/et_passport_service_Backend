<?php
// Allow from any origin (for development only — restrict in production)
header("Access-Control-Allow-Origin: *");

// Allow specific methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// If it's a preflight request, return early
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');

switch ($request) {
    // choose.php
    case '/start-application':
        include __DIR__ . '/../Src/Views/Appointment/choose.php';
        break;
    // choose the category
    case '/standard/chooseCategory':
        include __DIR__ . '/../Src/Views/Appointment/Normal/page1.php';
        break;
    case '/urgent/chooseCategory':
        include __DIR__ . '/../Src/Views/Appointment/urgent/page1.php';
        break;

    // from the category choose the service type from normal 
    case '/standard/NewPass/site':
        include __DIR__ . '/../Src/Views/Appointment/Normal/NewPass/page2.php';
        break;
    case '/RENEWAL/serviceType':
        include __DIR__ . '/../Src/Views/Appointment/Normal/page2.php';
        break;
    case '/LostPass/site':
        include __DIR__ . '/../Src/Views/Appointment/Normal/page2.php';
        break;
    case '/normal/site':
        include __DIR__ . '/../Src/Views/Appointment/Normal/page2.php';
        break;
    // from the category choose the service type from urgent 
    case '/NewPass/urgencyType':
        include __DIR__ . '/../Src/Views/Appointment/Normal/page2.php';
        break;
    case '/RenewalPass/urgencyType':
        include __DIR__ . '/../Src/Views/Appointment/Normal/page2.php';
        break;
    case '/LostPass/urgencyType':
        include __DIR__ . '/../Src/Views/Appointment/Normal/page3.php';
        break;
    case '/Correction/urgencyType':
        include __DIR__ . '/../Src/Views/Appointment/Urgent/correction/urgency.php';
        break;
    // =============== *** ================== //
    case '/standard/NewPass/dateTime':
        include __DIR__ . '/../Src/Views/Appointment/Normal/NewPass/page3.php';
        break;
    case '/standard/NewPass/PersonalInfo':
        include __DIR__ . '/../Src/Views/Appointment/Normal/NewPass/Page4/personalinfo.php';
        break;
    case '/standard/NewPass/address':
        include __DIR__ . '/../Src/Views/Appointment/Normal/NewPass/Page4/address.php';
        break;
    case '/standard/NewPass/family':
        include __DIR__ . '/../Src/Views/Appointment/Normal/NewPass/Page4/family.php';
        break;
    case '/standard/NewPass/attachments':
        include __DIR__ . '/../Src/Views/Appointment/Normal/NewPass/Page4/attachment.php';
        break;
    case '/standard/NewPass/passportpage':
        include __DIR__ . '/../Src/Views/Appointment/Normal/NewPass/Page5/passportPage.php';
        break;
    case '/standard/NewPass/summary':
        include __DIR__ . '/../Src/Views/Appointment/Normal/NewPass/Page5/summary.php';
        break;



    // Add more cases for each form step

    default:
        http_response_code(404);
        include __DIR__ . '/../Src/Views/errors/404.php';
        break;
}
