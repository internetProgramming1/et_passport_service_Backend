<?php
header("Content-Type: application/json");
session_start();

// Handle OPTIONS request for CORS preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    http_response_code(200);
    exit();
}

// Enable CORS if needed
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Initialize response
$response = [
    'success' => false,
    'message' => 'Invalid request',
    'data' => []
];

try {
    // Get POST data
    $input = json_decode(file_get_contents('php://input'), true);
    $data = $input ?? [];

    // Validate required fields
    if (empty($data)) {
        throw new Exception("No data received");
    }

    // Process different forms
    if (isset($data['site'])) {
        // Site selection form
        $required = ['site', 'city', 'office', 'delivery'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new Exception("Please fill in all site selection fields");
            }
        }

        $_SESSION['site_data'] = [
            'site' => htmlspecialchars($data['site']),
            'city' => htmlspecialchars($data['city']),
            'office' => htmlspecialchars($data['office']),
            'delivery' => htmlspecialchars($data['delivery'])
        ];

        $response = [
            'success' => true,
            'message' => 'Site selection saved',
            'data' => $_SESSION['site_data']
        ];
    } elseif (isset($data['date'])) {
        // Date/time form
        if (empty($data['date']) || empty($data['time'])) {
            throw new Exception("Please select both date and time");
        }

        $_SESSION['appointment'] = [
            'date' => htmlspecialchars($data['date']),
            'time' => htmlspecialchars($data['time'])
        ];

        $response = [
            'success' => true,
            'message' => 'Appointment time saved',
            'data' => $_SESSION['appointment']
        ];
    } elseif (isset($data['region'])) {
        // Address form
        $required = ['region', 'city', 'subcity', 'woreda', 'kebele', 'house_no', 'id_no'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new Exception("Please fill in all address fields.");
            }
        }

        $_SESSION['address_info'] = [
            'region' => htmlspecialchars($data['region']),
            'city' => htmlspecialchars($data['city']),
            'subcity' => htmlspecialchars($data['subcity']),
            'woreda' => htmlspecialchars($data['woreda']),
            'kebele' => htmlspecialchars($data['kebele']),
            'house_no' => htmlspecialchars($data['house_no']),
            'id_no' => htmlspecialchars($data['id_no']),
        ];

        $response = [
            'success' => true,
            'message' => 'Address information saved',
            'data' => $_SESSION['address_info']
        ];
    } else {
        throw new Exception("Unrecognized form data");
    }
} catch (Exception $e) {
    http_response_code(400);
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
