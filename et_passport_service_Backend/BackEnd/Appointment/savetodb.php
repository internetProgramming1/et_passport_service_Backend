<?php
session_start();
header("Content-Type: application/json");

// Database connection
$host = "localhost";
$db = "passport_db";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'DB Connection failed', 'error' => $e->getMessage()]);
    exit();
}

// Make sure all session data is available
if (
    isset(
        $_SESSION['type'],
        $_SESSION['category'],
        $_SESSION['siteData'],
        $_SESSION['appointment'],
        $_SESSION['personalInfo'],
        $_SESSION['addressData'],
        $_SESSION['family'],
        $_SESSION['documents']
    )
) {
    try {
        // Insert into main user table
        $stmt = $pdo->prepare("INSERT INTO applications (
            type, category, site, city, office, delivery, 
            appointment_date, appointment_time, 
            firstname, middlename, lastname, phone, email, gender, dob, under18,
            birthplace, adopted, birth_certificate, nationality, marital_status, occupation,
            region, address_city, subcity, woreda, kebele, house_no, id_no,
            mother, father, spouse,
            birth_certificate_front, birth_certificate_back, id_front, id_back
        ) VALUES (
            :type, :category, :site, :city, :office, :delivery,
            :date, :time,
            :firstname, :middlename, :lastname, :phone, :email, :gender, :dob, :under18,
            :birthplace, :adopted, :birth_certificate, :nationality, :marital_status, :occupation,
            :region, :address_city, :subcity, :woreda, :kebele, :house_no, :id_no,
            :mother, :father, :spouse,
            :bc_front, :bc_back, :id_front, :id_back
        )");

        $stmt->execute([
            ':type' => $_SESSION['type'],
            ':category' => $_SESSION['category'],
            ':site' => $_SESSION['siteData']['site'],
            ':city' => $_SESSION['siteData']['city'],
            ':office' => $_SESSION['siteData']['office'],
            ':delivery' => $_SESSION['siteData']['delivery'],
            ':date' => $_SESSION['appointment']['date'],
            ':time' => $_SESSION['appointment']['time'],

            ':firstname' => $_SESSION['personalInfo']['firstname'],
            ':middlename' => $_SESSION['personalInfo']['middlename'],
            ':lastname' => $_SESSION['personalInfo']['lastname'],
            ':phone' => $_SESSION['personalInfo']['phone'],
            ':email' => $_SESSION['personalInfo']['email'],
            ':gender' => $_SESSION['personalInfo']['gender'],
            ':dob' => $_SESSION['personalInfo']['dob'],
            ':under18' => $_SESSION['personalInfo']['under18'],
            ':birthplace' => $_SESSION['personalInfo']['birthplace'],
            ':adopted' => $_SESSION['personalInfo']['adopted'],
            ':birth_certificate' => $_SESSION['personalInfo']['birth_certificate'],
            ':nationality' => $_SESSION['personalInfo']['nationality'],
            ':marital_status' => $_SESSION['personalInfo']['marital_status'],
            ':occupation' => $_SESSION['personalInfo']['occupation'],

            ':region' => $_SESSION['addressData']['region'],
            ':address_city' => $_SESSION['addressData']['city'],
            ':subcity' => $_SESSION['addressData']['subcity'],
            ':woreda' => $_SESSION['addressData']['woreda'],
            ':kebele' => $_SESSION['addressData']['kebele'],
            ':house_no' => $_SESSION['addressData']['house_no'],
            ':id_no' => $_SESSION['addressData']['id_no'],

            ':mother' => $_SESSION['family']['mother'],
            ':father' => $_SESSION['family']['father'],
            ':spouse' => $_SESSION['family']['spouse'],

            ':bc_front' => $_SESSION['documents']['birth_certificate_front'],
            ':bc_back' => $_SESSION['documents']['birth_certificate_back'],
            ':id_front' => $_SESSION['documents']['id_front'],
            ':id_back' => $_SESSION['documents']['id_back']
        ]);

        // Clear session
        session_unset();
        session_destroy();

        echo json_encode(['success' => true, 'message' => 'Application saved to database.']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Failed to save data.', 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Incomplete session data.']);
}
