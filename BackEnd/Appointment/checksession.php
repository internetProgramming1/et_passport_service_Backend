<?php
session_start();
header("Content-Type: application/json");

// Check if required session data exists
if (
    isset(
        $_SESSION['type'],
        $_SESSION['category'],
        $_SESSION['siteData'],
        $_SESSION['dateTime'],
        // $_SESSION['personalInfo'],
        // $_SESSION['addressData'],
        // $_SESSION['family'],
        // $_SESSION['documents']
    )
) {
    $response = [
        'success' => true,
        'message' => 'All session data loaded',
        'data' => [
            'type' => $_SESSION['type'],
            'category' => $_SESSION['category'],
            'siteData' => $_SESSION['siteData'],
            'dateTime' => $_SESSION['dateTime'],
            // 'personalInfo' => $_SESSION['personalInfo'],
            // 'addressData' => $_SESSION['addressData'],
            // 'family' => $_SESSION['family'],
            // 'documents' => $_SESSION['documents']
        ]

    ];
} else {
    $response = [
        'success' => false,
        'message' => 'Some session data is missing.',
        'data' => $_SESSION // Helpful for debugging
    ];
}

echo json_encode($response);
