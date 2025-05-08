<?php
require 'formHandler.php'; // Include your form handling code


header("Content-Type: application/json");

// Allow access from frontend
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Credentials: true");

echo json_encode([
    'success' => true,
    'data' => $_SESSION
]);
