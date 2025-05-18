<?php

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
        include __DIR__ . '/../Src/Views/Appointment/Normal/page2.php';
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





    // Add more cases for each form step

    default:
        http_response_code(404);
        echo "Form page not found.";
        break;
}
