<?php
require 'config/db.php';
try {
    $stmt = $pdo->prepare("INSERT INTO applications (
        type, category, site, city, office, delivery,
        appointment_date, appointment_time,
        firstname, middlename, lastname, phone, email, gender, dob, under18,
        birthplace, adopted, birth_certificate, nationality, marital_status, occupation,
        region, address_city, subcity, woreda, kebele, house_no, id_no,
        mother, father, spouse,
        birth_certificate_front, birth_certificate_back, id_front, id_back,
        pageNo, application_no, registered_date
    ) VALUES (
        :type, :category, :site, :city, :office, :delivery,
        :date, :time,
        :firstname, :middlename, :lastname, :phone, :email, :gender, :dob, :under18,
        :birthplace, :adopted, :birth_certificate, :nationality, :marital_status, :occupation,
        :region, :address_city, :subcity, :woreda, :kebele, :house_no, :id_no,
        :mother, :father, :spouse,
        :bc_front, :bc_back, :id_front, :id_back,
        :pageNo, :appno, :regdate
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

        ':mother' => json_encode($_SESSION['family']['mother']),
        ':father' => json_encode($_SESSION['family']['father']),
        ':spouse' => json_encode($_SESSION['family']['spouse']),

        ':bc_front' => $_SESSION['attachments']['birth_cer_front'],
        ':bc_back' => $_SESSION['attachments']['birth_cer_back'],
        ':id_front' => $_SESSION['attachments']['id_front'],
        ':id_back' => $_SESSION['attachments']['id_back'],

        ':pageNo' => $_SESSION['pageNo'] ?? 'N/A',
        ':appno' => $data['applicationNo'],
        ':regdate' => $data['registeredDate'] // Format: dd/mm/yyyy
    ]);

    echo json_encode(['success' => true, 'message' => 'Application saved successfully.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Failed to save data.', 'error' => $e->getMessage()]);
}
