<?php
// tracking.php

// Start session if needed
session_start();

// Include the database connection file
// Adjust this path based on your structure (relative path)
include_once '../Appointment/config/db.php';

// Test database connection
try {
    $conn->query("SELECT 1");
    // Optional: Uncomment for debugging
    // echo "Database connection successful!<br>";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Validate and sanitize input
        if (isset($_POST['tracking-id'], $_POST['applicant-name'], $_POST['passport-status'])) {
            $tracking_id = htmlspecialchars(trim($_POST['tracking-id']));
            $applicant_name = htmlspecialchars(trim($_POST['applicant-name']));
            $passport_status = htmlspecialchars(trim($_POST['passport-status']));

            // Validate that fields are not empty
            if (empty($tracking_id) || empty($applicant_name) || empty($passport_status)) {
                throw new Exception("All fields are required.");
            }

            // Prepare and execute the insert statement
            $sql = "INSERT INTO tracking (tracking_id, applicant_name, passport_status) 
                    VALUES (:tracking_id, :applicant_name, :passport_status)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':tracking_id', $tracking_id);
            $stmt->bindParam(':applicant_name', $applicant_name);
            $stmt->bindParam(':passport_status', $passport_status);

            $stmt->execute();

            // Success message
            echo "✅ Tracking information added successfully!";
        } else {
            throw new Exception("Form fields are missing.");
        }
    } catch (Exception $e) {
        // Error message
        echo "❌ Error: " . $e->getMessage();
    }
} else {
    // If someone tries to access directly without POST
    echo "Invalid request method. Please submit the form properly.";
}
?>
