<?php
// test_connection.php

// Include the database connection file
include_once '../Appointment/config/db.php';

try {
    // Test the connection by executing a simple query
    $conn->query("SELECT 1");
    echo "✅ Database connection successful!";
} catch (PDOException $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
?>
