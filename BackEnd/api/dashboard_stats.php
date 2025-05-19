<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../Config/db.php'; // Adjust path if needed

try {
    // Registered Users
    $registered = $db->query("SELECT COUNT(*) FROM users")->fetchColumn();

    // Approved Applications
    $approved = $db->query("SELECT COUNT(*) FROM applications WHERE status='approved'")->fetchColumn();

    // Rejected Applications
    $rejected = $db->query("SELECT COUNT(*) FROM applications WHERE status='rejected'")->fetchColumn();

    // // Pending Applications
    // $pending = $db->query("SELECT COUNT(*) FROM applications WHERE status='pending'")->fetchColumn();

    // // Waiting Applications
    // $waiting = $db->query("SELECT COUNT(*) FROM applications WHERE status='waiting'")->fetchColumn();

    echo json_encode([
        'registered' => (int)$registered,
        'approved'   => (int)$approved,
        'rejected'   => (int)$rejected,
        // 'pending'    => (int)$pending,
        // 'waiting'    => (int)$waiting
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error', 'details' => $e->getMessage()]);
}