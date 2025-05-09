<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

// Step 1: Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['tracking_id'])) {
    echo json_encode(["success" => false, "message" => "Tracking ID is required."]);
    exit;
}

$tracking_id = $data['tracking_id'];

// Step 2: PDO Connection
$host = 'localhost';
$db = 'project_et_passport_db';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Step 3: Prepare and Execute SQL
    $stmt = $pdo->prepare("SELECT tracking_id, applicant_name, passport_status FROM tracking WHERE tracking_id = ?");
    $stmt->execute([$tracking_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Step 4: Respond
    if ($result) {
        echo json_encode([
            "success" => true,
            "tracking_id" => $result['tracking_id'],
            "applicant_name" => $result['applicant_name'],
            "passport_status" => $result['passport_status']
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Tracking ID not found."]);
    }

} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
}
?>
