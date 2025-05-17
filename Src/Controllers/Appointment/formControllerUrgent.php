<?php
session_start();
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



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize response
    $response = [
        'success' => false,
        'message' => 'Invalid request',
        'data' => []
    ];

    try {  // the input var hold any data that are send from the front end like an array

        if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'multipart/form-data') !== false) {
            require 'FileUpload.php'; // Include your file upload handling code
            if (isset($_FILES['birth_certificate_front']) && isset($_FILES['birth_certificate_back']) && isset($_FILES['id_front']) && isset($_FILES['id_back'])) {
                $file = $_FILES['birth_certificate_front'];
                $bcf = fileProcessing($file);

                $_SESSION['attachmentsSaving']['birth_certificate_front'] = [
                    'name' => $bcf,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $file = $_FILES['birth_certificate_back'];
                $bcb = fileProcessing($file);
                $_SESSION['attachmentsSaving']['birth_certificate_back'] = [
                    'name' => $bcb,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $file = $_FILES['id_front'];
                $idf = fileProcessing($file);
                $_SESSION['attachmentsSaving']['id_front'] = [
                    'name' => $idf,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $file = $_FILES['id_back'];
                $idb = fileProcessing($file);

                $_SESSION['attachmentsSaving']['id_back'] = [
                    'name' => $idb,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $_SESSION['attachments'] = [
                    'birth_cer_front' => $bcf,
                    'birth_cer_back' => $bcb,
                    'id_front' => $idf,
                    'id_back' => $idb
                ];
            }



            if (isset($_FILES['old_Passport']) && isset($_FILES['photo']) && isset($_FILES['id_front']) && isset($_FILES['id_back'])) {
                $file = $_FILES['old_Passport'];
                $oldP = fileProcessing($file);
                $_SESSION['attachmentsSaving']['old_Passport'] = [
                    'name' => $oldP,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $file = $_FILES['photo'];
                $photo = fileProcessing($file);
                $_SESSION['attachmentsSaving']['photo'] = [
                    'name' => $photo,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $file = $_FILES['id_front'];
                $idf = fileProcessing($file);
                $_SESSION['attachmentsSaving']['id_front'] = [
                    'name' => $idf,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $file = $_FILES['id_back'];
                $idb = fileProcessing($file);
                $_SESSION['attachmentsSaving']['id_back'] = [
                    'name' => $idb,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $_SESSION['attachments'] = [
                    'old_Passport' => $oldP,
                    'photo' => $photo,
                    'id_front' => $idf,
                    'id_back' => $idb
                ];
            }
            if (isset($_FILES['police']) && isset($_FILES['old_Passport']) && isset($_FILES['photo']) && isset($_FILES['id_front']) && isset($_FILES['id_back'])) {
                $file = $_FILES['police'];
                $police = fileProcessing($file);
                $_SESSION['attachmentsSaving']['police'] = [
                    'name' => $police,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $file = $_FILES['old_Passport'];
                $oldP = fileProcessing($file);
                $_SESSION['attachmentsSaving']['old_Passport'] = [
                    'name' => $oldP,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $file = $_FILES['photo'];
                $photo = fileProcessing($file);
                $_SESSION['attachmentsSaving']['photo'] = [
                    'name' => $photo,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $file = $_FILES['id_front'];
                $idf = fileProcessing($file);
                $_SESSION['attachmentsSaving']['id_front'] = [
                    'name' => $idf,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];

                $file = $_FILES['id_back'];
                $idb = fileProcessing($file);
                $_SESSION['attachmentsSaving']['id_back'] = [
                    'name' => $idb,
                    'tmp_name' => $file['tmp_name'] // save path for later use
                ];
                $_SESSION['attachments'] = [
                    'old_Passport' => $oldP,
                    'photo' => $photo,
                    'id_front' => $idf,
                    'id_back' => $idb,
                    'police' => $police
                ];
            }
            $response = [
                'success' => true,
                'message' => 'Attachments saved successfully.',
                'data' => $_SESSION['attachments']
            ];
        } else {

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
            } elseif (isset($data['urgency'])) {
                // then the urgency of the request [normal, urgent]
                $_SESSION['urgency'] = $data['urgency'];
                $response = [
                    'success' => true,
                    'message' => 'Urgency of request saved',
                    'data' => $_SESSION['urgency']
                ];
            } elseif (isset($data['serviceType'])) {

                $_SESSION['serviceType'] = $data['serviceType'];
                $response = [
                    'success' => true,
                    'message' => 'service type of request saved',
                    'data' => $_SESSION['serviceType']
                ];
            } elseif (isset($data['site'])) {

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
            } elseif (isset($data['deliveryDate'])) {
                // Date/time form

                $_SESSION['deliveryDate'] = $data['deliveryDate'];

                $response = [
                    'success' => true,
                    'message' => 'Appointment time saved',
                    'data' => $_SESSION['deliveryDate']
                ];
            } elseif (isset($data['firstname'])) {
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
                    'success' => true,
                    'message' => 'Form data saved successfully.',
                    'data' => $_SESSION['personalInfo']
                ];
            } elseif (isset($data['region'])) {

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
            } elseif (isset($data['mother_first_name'])) {

                // Prepare family data
                $familyData = [
                    'mother' => [
                        'first_name' => htmlspecialchars($data['mother_first_name']),
                        'father_name' => htmlspecialchars($data['mother_father_name']),
                        'grandfather_name' => htmlspecialchars($data['mother_grandfather_name'])
                    ],
                    'father' => [
                        'first_name' => htmlspecialchars($data['father_first_name']),
                        'father_name' => htmlspecialchars($data['father_father_name']),
                        'grandfather_name' => htmlspecialchars($data['father_grandfather_name'])
                    ]
                ];

                // Include spouse data if available
                if (isset($data['spouse_first_name'])) {
                    $familyData['spouse'] = [
                        'first_name' => htmlspecialchars($data['spouse_first_name']),
                        'father_name' => htmlspecialchars($data['spouse_father_name']),
                        'grandfather_name' => htmlspecialchars($data['spouse_grandfather_name'])
                    ];
                }

                // Store family data in session
                $_SESSION['family'] = $familyData;

                // Prepare response
                $response = [
                    'success' => true,
                    'message' => 'Family Information Saved.',
                    'data' => $_SESSION['family']
                ];
            } elseif (isset($data['pageNo'])) {
                $_SESSION['pageNo'] = $data['pageNo'];
                $response = [
                    'success' => true,
                    'message' => 'page no requested saved',
                    'data' => $_SESSION['pageNo']
                ];
            } elseif (isset($data['old_passport_number'])) {
                $_SESSION['PassportInfo'] = [
                    'old_passport_number' => htmlspecialchars($data['old_passport_number']),
                    'old_issue_date' => htmlspecialchars($data['old_issue_date']),
                    'old_expiry_date' => htmlspecialchars($data['old_expiry_date']),
                    'has_correction' => isset($data['has_correction']) ? htmlspecialchars($data['has_correction']) : null,
                    'correction_type' => isset($data['correction_type']) ? htmlspecialchars($data['correction_type']) : null,
                ];
                $response = [
                    'success' => true,
                    'message' => 'page no requested saved',
                    'data' => $_SESSION['PassportInfo']
                ];
            } elseif (isset($data['registrationDate'])) {
                $_SESSION['Registered'] = [
                    'registrationDate' => htmlspecialchars($data['registrationDate']),
                    'applicationNumber' => htmlspecialchars($data['applicationNumber'])
                ];
                require_once __DIR__ . '/../../Models/saveToDbU.php';
                $saved = false;
                switch ($_SESSION['category']) {
                    case 'new':
                        $saved = saveUrgentNewApplication($_SESSION);
                        break;
                    case 'lost':
                        $saved = saveUrgentLostApplication($_SESSION);
                        break;
                    case 'renewal':
                        $saved = saveUrgentRenewalApplication($_SESSION);
                        break;
                    case 'correction':
                        $saved = saveUrgentCorrectionApplication($_SESSION);
                        break;
                }
                if ($saved == false) {
                    $response = [
                        'success' => false,
                        'message' => 'Registration Failed',
                    ];
                } else {
                    $response = [
                        'success' => true,
                        'message' => 'Registered successfully',
                        'data' => $_SESSION['Registered']
                    ];
                }
            } else {
                throw new Exception("Unrecognized form data");
            }
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

    file_put_contents('session_urgent.json', json_encode($_SESSION, JSON_PRETTY_PRINT)); // Save session data to a file for debugging

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode([
        'success' => true,
        'message' => 'Request get successfully',
        'data' => $_SESSION
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method',
        'data' => []
    ]);
}
