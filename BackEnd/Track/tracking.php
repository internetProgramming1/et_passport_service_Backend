<?php
// Set response headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Get input data
$data = json_decode(file_get_contents("php://input"), true);

// Check for required fields
if (
    !isset($data['tracking_id']) || empty($data['tracking_id']) ||
    !isset($data['applicant_name']) || empty($data['applicant_name']) ||
    !isset($data['passport_status']) || empty($data['passport_status'])
) {
    echo json_encode([
        "success" => false,
        "message" => "All fields are required."
    ]);
    exit;
}

$tracking_id = $data['tracking_id'];
$applicant_name = $data['applicant_name'];
$passport_status = $data['passport_status'];

// Database config
$host = 'localhost';
$dbname = 'project_et_passport_db'; // ✅ Change if yours is different
$username = 'root';
$password = ''; // Default for XAMPP

try {
    // Connect with PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert into tracking table
    $stmt = $pdo->prepare("INSERT INTO tracking (tracking_id, applicant_name, passport_status) VALUES (:tracking_id, :applicant_name, :passport_status)");
    $stmt->execute([
        ':tracking_id' => $tracking_id,
        ':applicant_name' => $applicant_name,
        ':passport_status' => $passport_status
    ]);

    echo json_encode([
        "success" => true,
        "message" => "Tracking information added successfully."
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "Database error: " . $e->getMessage()
    ]);
}
?>
