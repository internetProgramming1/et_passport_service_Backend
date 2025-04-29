<?php

header("Content-Type: application/json");

// Allow requests from http://127.0.0.1:5500
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");

// Allow specific HTTP methods (e.g., GET, POST, OPTIONS)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Allow specific headers in the request
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");

// Handle OPTIONS request for CORS preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

session_start();

// Initialize response
$response = [
    'success' => false,
    'message' => 'Invalid request',
    'data' => []
];



try {  // the input var hold any data that are send from the front end like an array 
    $input = json_decode(file_get_contents('php://input'), true);
    $data = $input ?? [];

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Invalid JSON input");
    }

    if (isset($data['type'])) {
        // first accept the type of request [normal, urgent]
        $_SESSION['type'] = $data['type'];

        $response = [
            'success' => true,
            'message' => 'Type of request saved',
            'data' => $_SESSION['type']
        ];
    } elseif (isset($data['category'])) {
        // then the category of the passport [new, renewal, correction, .....]
        $_SESSION['category'] = $data['category'];
        $response = [
            'success' => true,
            'message' => 'Type of request saved',
            'data' => $_SESSION['category']
        ];
    } elseif (isset($data['siteData'])) {
        // Site selection form
        $required = ['site', 'city', 'office', 'delivery'];

        $_SESSION['siteData'] = [
            'site' => htmlspecialchars($data['site']),
            'city' => htmlspecialchars($data['city']),
            'office' => htmlspecialchars($data['office']),
            'delivery' => htmlspecialchars($data['delivery'])
        ];

        $response = [
            'success' => true,
            'message' => 'Site selection saved',
            'data' => $_SESSION['siteData']
        ];
    } elseif (isset($data['dateTime'])) {
        // Date/time form

        $_SESSION['appointment'] = [
            'date' => htmlspecialchars($data['date']),
            'time' => htmlspecialchars($data['time'])
        ];

        $response = [
            'success' => true,
            'message' => 'Appointment time saved',
            'data' => $_SESSION['appointment']
        ];
    } elseif (isset($data['personalInfo'])) {
        $requiredFields = ['firstname', 'lastname', 'phone', 'email', 'gender', 'dob', 'birthplace', 'nationality'];

        // Sanitize and store the form data
        $_SESSION['personalInfo'] = [
            'firstname' => htmlspecialchars($data['firstname']),
            'middlename' => isset($data['middlename']) ? htmlspecialchars($data['middlename']) : null,
            'lastname' => htmlspecialchars($data['lastname']),
            'phone' => htmlspecialchars($data['phone']),
            'email' => htmlspecialchars($data['email']),
            'gender' => htmlspecialchars($data['gender']),
            'dob' => htmlspecialchars($data['dob']),
            'under18' => isset($data['under18']) ? htmlspecialchars($data['under18']) : null,
            'birthplace' => htmlspecialchars($data['birthplace']),
            'adopted' => isset($data['adopted']) ? htmlspecialchars($data['adopted']) : null,
            'birth_certificate' => isset($data['birth_certificate']) ? htmlspecialchars($data['birth_certificate']) : null,
            'nationality' => htmlspecialchars($data['nationality']),
            'marital_status' => isset($data['marital_status']) ? htmlspecialchars($data['marital_status']) : null,
            'occupation' => isset($data['occupation']) ? htmlspecialchars($data['occupation']) : null
        ];

        // Respond with success message
        $response = [
            'status' => 'success',
            'message' => 'Form data saved successfully.',
            'data' => $_SESSION['personalInfo']
        ];
    } elseif (isset($data['addressData'])) {

        $_SESSION['addressData'] = [
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
            'data' => $_SESSION['addressData']
        ];
    } elseif (isset($data['family'])) {
        $_SESSION['family'] = [
            'mother' => htmlspecialchars($data['mother']),
            'father' => htmlspecialchars($data['father']),
            'spouse' => isset($data['spouse']) ? htmlspecialchars($data['spouse']) : null
        ];
        $response = [
            'success' => true,
            'message' => 'Family Information Saved.',
            'data' => $_SESSION['family']
        ];
        // Check if this is a document upload request
    } elseif (isset($_POST['document_upload'])) {
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        $maxSize = 1 * 1024 * 1024; // 1MB

        $uploadedFiles = [];
        $requiredFields = [
            'birth_certificate_front',
            'birth_certificate_back',
            'id_front',
            'id_back'
        ];

        foreach ($requiredFields as $field) {
            if (!isset($_FILES[$field])) {
                throw new Exception("Missing required file: $field");
            }

            $file = $_FILES[$field];

            // Validate file
            if ($file['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("Error uploading {$field}: " . $file['error']);
            }

            if (!in_array($file['type'], $allowedTypes)) {
                throw new Exception("Invalid file type for {$field}. Only JPG, PNG, or PDF allowed.");
            }

            if ($file['size'] > $maxSize) {
                throw new Exception("File too large for {$field}. Max 1MB allowed.");
            }

            // Generate unique filename
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '_' . $field . '.' . $extension;
            $destination = $uploadDir . $filename;

            if (!move_uploaded_file($file['tmp_name'], $destination)) {
                throw new Exception("Failed to move uploaded file: {$field}");
            }

            $uploadedFiles[$field] = $destination;
        }

        // Store in session
        $_SESSION['documents'] = $uploadedFiles;

        $response = [
            'success' => true,
            'message' => 'Documents uploaded successfully',
            'data' => $uploadedFiles
        ];
    } else {
        throw new Exception("Unrecognized form data");
    }

    // Regenerate session ID for security
    session_regenerate_id(true);
} catch (Exception $e) {
    http_response_code(400); // Bad Request
    echo json_encode([
        'success' => false,
        'error' => 'Invalid JSON input',
        'message' => $e->getMessage()
    ]);

    exit();
}


echo json_encode($response);
