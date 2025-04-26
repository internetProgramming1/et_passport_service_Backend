<?php 
// Include the db.php file for database connection
include_once '../BackEnd/Appointment/config/db.php'; // Adjust path based on your structure

// Test the connection
try {
    // Try to run a simple query to check the connection
    $conn->query("SELECT 1");
    echo "Connection successful!";
} catch (PDOException $e) {
    // If there's an error, it will show the error message
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Start the session (if not already started)
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $tracking_id = htmlspecialchars($_POST['tracking-id']);
    $applicant_name = htmlspecialchars($_POST['applicant-name']);
    $passport_status = htmlspecialchars($_POST['passport-status']);

    // Prepare the SQL query to insert data into the tracking table
    $sql = "INSERT INTO tracking (tracking_id, applicant_name, passport_status) 
            VALUES (:tracking_id, :applicant_name, :passport_status)";

    try {
        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tracking_id', $tracking_id);
        $stmt->bindParam(':applicant_name', $applicant_name);
        $stmt->bindParam(':passport_status', $passport_status);
        
        // Execute the statement
        $stmt->execute();

        // Success message
        echo "Tracking information successfully added!";
    } catch (PDOException $e) {
        // If there's an error inserting data
        echo "Error: " . $e->getMessage();
    }
}
?>
