<?php
// Set header for JSON response
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


$host = "localhost";
$username = "root";
$password = "";
$dbname = "project_et_passport_db"; 

// Connect to database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

// Read JSON input from Axios
$input = json_decode(file_get_contents("php://input"), true);

// Check if tracking_id is provided
if (!isset($input['tracking_id']) || empty($input['tracking_id'])) {
    echo json_encode(["success" => false, "message" => "Tracking ID is missing."]);
    exit();
}

$trackingId = $conn->real_escape_string($input['tracking_id']);

// Fetch tracking info
$sql = "SELECT tracking_id, applicant_name, passport_status FROM tracking WHERE tracking_id = '$trackingId' LIMIT 1";
$result = $conn->query($sql);

// Return data
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "success" => true,
        "tracking_id" => $row["tracking_id"],
        "applicant_name" => $row["applicant_name"],
        "passport_status" => $row["passport_status"]
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Tracking ID not found."]);
}

// Close connection
$conn->close();
?>
