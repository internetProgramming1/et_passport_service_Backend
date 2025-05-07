<?php

session_start();

// Display error messages for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);




$host = "localhost";
$db = "renewal_pages";  
$user = "root";       
$pass = "";            
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


if (empty($_POST)) {
    echo "⚠️ Form submitted, but no data was received.";
    var_dump($_POST); // Debugging line
    exit;
}


$city = sanitize($_POST['city'] ?? '');
$officer = sanitize($_POST['officer'] ?? '');
$first_name = sanitize($_POST['first_name'] ?? '');
$second_name = sanitize($_POST['second_name'] ?? '');
$grandfather_name = sanitize($_POST['grandfather_name'] ?? '');
$dob = $_POST['dob'] ?? '';
$nationality = sanitize($_POST['nationality'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$birthplace = sanitize($_POST['birthplace'] ?? '');
$birth_cert_id = sanitize($_POST['birth_cert_id'] ?? '');
$occupation = sanitize($_POST['occupation'] ?? '');
$hair_color = sanitize($_POST['hair_color'] ?? '');
$gender = sanitize($_POST['gender'] ?? '');
$marital_status = sanitize($_POST['marital_status'] ?? '');
$height = intval($_POST['height'] ?? 0);
$eye_color = sanitize($_POST['eye_color'] ?? '');
$status = sanitize($_POST['status'] ?? '');

$region = sanitize($_POST['region'] ?? '');
$address_city = sanitize($_POST['address_city'] ?? '');
$state = sanitize($_POST['state'] ?? '');
$zone = sanitize($_POST['zone'] ?? '');
$woreda = sanitize($_POST['woreda'] ?? '');
$kebele = sanitize($_POST['kebele'] ?? '');
$street = sanitize($_POST['street'] ?? '');
$house_number = sanitize($_POST['house_number'] ?? '');
$po_box = sanitize($_POST['po_box'] ?? '');

$passport_page = intval($_POST['passport_page'] ?? 0);
$old_passport_number = sanitize($_POST['old_passport_number'] ?? '');
$old_passport_issue_date = $_POST['old_passport_issue_date'] ?? '';
$old_passport_expiration_date = $_POST['old_passport_expiration_date'] ?? '';
$data_correction = isset($_POST['data_correction']) ? 1 : 0;


$sql = "INSERT INTO renewal_applications (
    first_name, second_name, grandfather_name, dob, nationality, email,
    birthplace, birth_cert_id, occupation, hair_color, gender, marital_status,
    height, eye_color, status, city, officer, region, address_city, state,
    zone, woreda, kebele, street, house_number, po_box, passport_page, old_passport_number, old_passport_issue_date, old_passport_expiration_date, data_correction
) VALUES (?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";


$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param(
       "ssssssssssssssisssssssssssssssi"

, // Adjusted for correct number of placeholders and types
        $first_name, $second_name, $grandfather_name, $dob, $nationality, $email,
        $birthplace, $birth_cert_id, $occupation, $hair_color, $gender, $marital_status,
        $height, $eye_color, $status, $city, $officer, $region, $address_city, $state,
        $zone, $woreda, $kebele, $street, $house_number, $po_box, $passport_page, $old_passport_number,
        $old_passport_issue_date, $old_passport_expiration_date, $data_correction
    );

    if ($stmt->execute()) {
        
        $_SESSION['message'] = "Application submitted successfully!";
        $_SESSION['message_type'] = 'success';
    } else {
       
        $_SESSION['message'] = "Error: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
    }

    $stmt->close();
} else {
    
    $_SESSION['message'] = "Statement preparation failed: " . $conn->error;
    $_SESSION['message_type'] = 'error';
}

$conn->close();


header("Location: renewal.php");
exit;
?>
