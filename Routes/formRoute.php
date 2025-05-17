<?php

$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');

switch ($request) {
    case '/start-application':
        include __DIR__ . '/../Src/Views/Appointment/choose.php';
        break;

    case '/normal/page1':
        include __DIR__ . '/../Src/Views/Appointment/Normal/page1.php';
        break;

    case '/normal/page2':
        include __DIR__ . '/../Src/Views/Appointment/Normal/page2.php';
        break;

    case '/urgent/page1':
        include __DIR__ . '/../Src/Views/Appointment/Urgent/page1.php';
        break;

    // Add more cases for each form step

    default:
        http_response_code(404);
        echo "Form page not found.";
        break;
}
