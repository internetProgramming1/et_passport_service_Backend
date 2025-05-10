<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load env variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Load header
include __DIR__ . '/../FrontEnd/header.html';

// Use a controller (e.g., PassportController)
// use App\Controllers\PassportController;

// $controller = new PassportController();
// $controller->handleApplication(); // Call your business logic

// Load footer
include __DIR__ . '/../FrontEnd/Head_Foot/footer.html';
