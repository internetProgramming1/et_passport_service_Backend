<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "new"); // Use your DB name if different

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$tracking_id = $_POST['tracking-id'];
$applicant_name = $_POST['applicant-name'];
$passport_status = $_POST['passport-status'];

// Insert into database
$sql = "INSERT INTO tracking (tracking_id, applicant_name, passport_status) 
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $tracking_id, $applicant_name, $passport_status);

if ($stmt->execute()) {
    echo "Tracking information added successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
