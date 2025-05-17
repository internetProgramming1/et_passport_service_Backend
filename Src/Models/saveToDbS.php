<?php
require __DIR__ . '/../../config/db.php';
function saveRenewalApplication($data)
{
    try {
        $conn = getDatabaseConnection(); // Your database connection function

        $stmt = $conn->prepare("INSERT INTO Renewal_Application (
            application_type, category, service_type,
            site, city, office, delivery_site,
            appointment_date, appointment_time,
            firstname, middlename, lastname, phone, email,
            gender, dob, under18, birthplace, adopted, birth_certificate, nationality,
            marital_status, occupation,
            region, address_city, subcity, woreda, kebele, house_no, id_no,
            mother_first_name, mother_father_name, mother_grandfather_name,
            father_first_name, father_father_name, father_grandfather_name,
            spouse_first_name, spouse_father_name, spouse_grandfather_name,
            old_passport_number, old_issue_date, old_expiry_date,
            has_correction, correction_type,
            old_passport_attachment, photo_attachment, id_front_attachment, id_back_attachment,
            pageNo, application_no, registered_date
        ) VALUES (
            :type, :category, :serviceType,
            :site, :city, :office, :delivery,
            :appointment_date, :appointment_time,
            :firstname, :middlename, :lastname, :phone, :email,
            :gender, :dob, :under18, :birthplace, :adopted, :birth_certificate, :nationality,
            :marital_status, :occupation,
            :region, :address_city, :subcity, :woreda, :kebele, :house_no, :id_no,
            :mother_first_name, :mother_father_name, :mother_grandfather_name,
            :father_first_name, :father_father_name, :father_grandfather_name,
            :spouse_first_name, :spouse_father_name, :spouse_grandfather_name,
            :old_passport_number, :old_issue_date, :old_expiry_date,
            :has_correction, :correction_type,
            :old_passport_attachment, :photo_attachment, :id_front_attachment, :id_back_attachment,
            :pageNo, :application_no, :registered_date
        )");

        // Bind parameters
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':serviceType', $data['serviceType']);

        // Site data
        $stmt->bindParam(':site', $data['siteData']['site']);
        $stmt->bindParam(':city', $data['siteData']['city']);
        $stmt->bindParam(':office', $data['siteData']['office']);
        $stmt->bindParam(':delivery', $data['siteData']['delivery']);

        // Appointment data
        $stmt->bindParam(':appointment_date', $data['dateTime']['date']);
        $stmt->bindParam(':appointment_time', $data['dateTime']['time']);

        // Personal info
        $stmt->bindParam(':firstname', $data['personalInfo']['firstname']);
        $stmt->bindParam(':middlename', $data['personalInfo']['middlename']);
        $stmt->bindParam(':lastname', $data['personalInfo']['lastname']);
        $stmt->bindParam(':phone', $data['personalInfo']['phone']);
        $stmt->bindParam(':email', $data['personalInfo']['email']);
        $stmt->bindParam(':gender', $data['personalInfo']['gender']);
        $stmt->bindParam(':dob', $data['personalInfo']['dob']);
        $stmt->bindParam(':under18', $data['personalInfo']['under18']);
        $stmt->bindParam(':birthplace', $data['personalInfo']['birthplace']);
        $stmt->bindParam(':adopted', $data['personalInfo']['adopted']);
        $stmt->bindParam(':birth_certificate', $data['personalInfo']['birth_certificate']);
        $stmt->bindParam(':nationality', $data['personalInfo']['nationality']);
        $stmt->bindParam(':marital_status', $data['personalInfo']['marital_status']);
        $stmt->bindParam(':occupation', $data['personalInfo']['occupation']);

        // Address data
        $stmt->bindParam(':region', $data['addressData']['region']);
        $stmt->bindParam(':address_city', $data['addressData']['city']);
        $stmt->bindParam(':subcity', $data['addressData']['subcity']);
        $stmt->bindParam(':woreda', $data['addressData']['woreda']);
        $stmt->bindParam(':kebele', $data['addressData']['kebele']);
        $stmt->bindParam(':house_no', $data['addressData']['house_no']);
        $stmt->bindParam(':id_no', $data['addressData']['id_no']);

        // Family data
        $stmt->bindParam(':mother_first_name', $data['family']['mother']['first_name']);
        $stmt->bindParam(':mother_father_name', $data['family']['mother']['father_name']);
        $stmt->bindParam(':mother_grandfather_name', $data['family']['mother']['grandfather_name']);
        $stmt->bindParam(':father_first_name', $data['family']['father']['first_name']);
        $stmt->bindParam(':father_father_name', $data['family']['father']['father_name']);
        $stmt->bindParam(':father_grandfather_name', $data['family']['father']['grandfather_name']);
        $stmt->bindParam(':spouse_first_name', $data['family']['spouse']['first_name']);
        $stmt->bindParam(':spouse_father_name', $data['family']['spouse']['father_name']);
        $stmt->bindParam(':spouse_grandfather_name', $data['family']['spouse']['grandfather_name']);

        // Passport info
        $stmt->bindParam(':old_passport_number', $data['PassportInfo']['old_passport_number']);
        $stmt->bindParam(':old_issue_date', $data['PassportInfo']['old_issue_date']);
        $stmt->bindParam(':old_expiry_date', $data['PassportInfo']['old_expiry_date']);
        $stmt->bindParam(':has_correction', $data['PassportInfo']['has_correction']);
        $stmt->bindParam(':correction_type', $data['PassportInfo']['correction_type']);

        // Attachments (assuming you've processed the file uploads and have the paths)
        $stmt->bindParam(':old_passport_attachment', $data['attachmentsSaving']['old_Passport']['name']);
        $stmt->bindParam(':photo_attachment', $data['attachmentsSaving']['photo']['name']);
        $stmt->bindParam(':id_front_attachment', $data['attachmentsSaving']['id_front']['name']);
        $stmt->bindParam(':id_back_attachment', $data['attachmentsSaving']['id_back']['name']);

        // Other data
        $stmt->bindParam(':pageNo', $data['pageNo']);
        $stmt->bindParam(':application_no', $data['Registered']['applicationNumber']);
        $stmt->bindParam(':registered_date', $data['Registered']['registrationDate']);

        $stmt->execute();

        return ['success' => true, 'message' => 'Application saved successfully'];
    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
    }
}
function saveNewApplication($data)
{
    try {
        $conn = getDatabaseConnection();

        $stmt = $conn->prepare("INSERT INTO New_Application (
            application_type, category,
            site, city, office, delivery_site,
            appointment_date, appointment_time,
            firstname, middlename, lastname, phone, email,
            gender, dob, under18, birthplace, adopted, birth_certificate, nationality,
            marital_status, occupation,
            region, address_city, subcity, woreda, kebele, house_no, id_no,
            mother_first_name, mother_father_name, mother_grandfather_name,
            father_first_name, father_father_name, father_grandfather_name,
            spouse_first_name, spouse_father_name, spouse_grandfather_name,
            birth_certificate_front, birth_certificate_back, id_front, id_back,
            pageNo, application_no, registered_date
        ) VALUES (
            :type, :category,
            :site, :city, :office, :delivery,
            :appointment_date, :appointment_time,
            :firstname, :middlename, :lastname, :phone, :email,
            :gender, :dob, :under18, :birthplace, :adopted, :birth_certificate, :nationality,
            :marital_status, :occupation,
            :region, :address_city, :subcity, :woreda, :kebele, :house_no, :id_no,
            :mother_first_name, :mother_father_name, :mother_grandfather_name,
            :father_first_name, :father_father_name, :father_grandfather_name,
            :spouse_first_name, :spouse_father_name, :spouse_grandfather_name,
            :birth_cer_front, :birth_cer_back, :id_front, :id_back,
            :pageNo, :application_no, :registered_date
        )");

        // Bind parameters
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':category', $data['category']);

        // Site data
        $stmt->bindParam(':site', $data['siteData']['site']);
        $stmt->bindParam(':city', $data['siteData']['city']);
        $stmt->bindParam(':office', $data['siteData']['office']);
        $stmt->bindParam(':delivery', $data['siteData']['delivery']);

        // Appointment data
        $stmt->bindParam(':appointment_date', $data['dateTime']['date']);
        $stmt->bindParam(':appointment_time', $data['dateTime']['time']);

        // Personal info
        $stmt->bindParam(':firstname', $data['personalInfo']['firstname']);
        $stmt->bindParam(':middlename', $data['personalInfo']['middlename']);
        $stmt->bindParam(':lastname', $data['personalInfo']['lastname']);
        $stmt->bindParam(':phone', $data['personalInfo']['phone']);
        $stmt->bindParam(':email', $data['personalInfo']['email']);
        $stmt->bindParam(':gender', $data['personalInfo']['gender']);
        $stmt->bindParam(':dob', $data['personalInfo']['dob']);
        $stmt->bindParam(':under18', $data['personalInfo']['under18']);
        $stmt->bindParam(':birthplace', $data['personalInfo']['birthplace']);
        $stmt->bindParam(':adopted', $data['personalInfo']['adopted']);
        $stmt->bindParam(':birth_certificate', $data['personalInfo']['birth_certificate']);
        $stmt->bindParam(':nationality', $data['personalInfo']['nationality']);
        $stmt->bindParam(':marital_status', $data['personalInfo']['marital_status']);
        $stmt->bindParam(':occupation', $data['personalInfo']['occupation']);

        // Address data
        $stmt->bindParam(':region', $data['addressData']['region']);
        $stmt->bindParam(':address_city', $data['addressData']['city']);
        $stmt->bindParam(':subcity', $data['addressData']['subcity']);
        $stmt->bindParam(':woreda', $data['addressData']['woreda']);
        $stmt->bindParam(':kebele', $data['addressData']['kebele']);
        $stmt->bindParam(':house_no', $data['addressData']['house_no']);
        $stmt->bindParam(':id_no', $data['addressData']['id_no']);

        // Family data
        $stmt->bindParam(':mother_first_name', $data['family']['mother']['first_name']);
        $stmt->bindParam(':mother_father_name', $data['family']['mother']['father_name']);
        $stmt->bindParam(':mother_grandfather_name', $data['family']['mother']['grandfather_name']);
        $stmt->bindParam(':father_first_name', $data['family']['father']['first_name']);
        $stmt->bindParam(':father_father_name', $data['family']['father']['father_name']);
        $stmt->bindParam(':father_grandfather_name', $data['family']['father']['grandfather_name']);
        $stmt->bindParam(':spouse_first_name', $data['family']['spouse']['first_name']);
        $stmt->bindParam(':spouse_father_name', $data['family']['spouse']['father_name']);
        $stmt->bindParam(':spouse_grandfather_name', $data['family']['spouse']['grandfather_name']);

        // Attachments
        $stmt->bindParam(':birth_cer_front', $data['attachments']['birth_cer_front']);
        $stmt->bindParam(':birth_cer_back', $data['attachments']['birth_cer_back']);
        $stmt->bindParam(':id_front', $data['attachments']['id_front']);
        $stmt->bindParam(':id_back', $data['attachments']['id_back']);

        // Other data
        $stmt->bindParam(':pageNo', $data['pageNo']);
        $stmt->bindParam(':application_no', $data['Registered']['applicationNumber']);
        $stmt->bindParam(':registered_date', $data['Registered']['registrationDate']);

        $stmt->execute();

        return ['success' => true, 'message' => 'New application saved successfully'];
    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
    }
}
function saveLostApplication($data)
{
    try {
        $conn = getDatabaseConnection();

        $stmt = $conn->prepare("INSERT INTO Lost_Application (
            application_type, category,
            site, city, office, delivery_site,
            appointment_date, appointment_time,
            firstname, middlename, lastname, phone, email,
            gender, dob, under18, birthplace, adopted, birth_certificate, nationality,
            marital_status, occupation,
            region, address_city, subcity, woreda, kebele, house_no, id_no,
            mother_first_name, mother_father_name, mother_grandfather_name,
            father_first_name, father_father_name, father_grandfather_name,
            spouse_first_name, spouse_father_name, spouse_grandfather_name,
            old_passport_number, old_issue_date, old_expiry_date,
            has_correction, correction_type,
            old_passport_attachment, photo_attachment, id_front_attachment, id_back_attachment, police_assurance_attachment,
            pageNo, application_no, registered_date
        ) VALUES (
            :type, :category,
            :site, :city, :office, :delivery,
            :appointment_date, :appointment_time,
            :firstname, :middlename, :lastname, :phone, :email,
            :gender, :dob, :under18, :birthplace, :adopted, :birth_certificate, :nationality,
            :marital_status, :occupation,
            :region, :address_city, :subcity, :woreda, :kebele, :house_no, :id_no,
            :mother_first_name, :mother_father_name, :mother_grandfather_name,
            :father_first_name, :father_father_name, :father_grandfather_name,
            :spouse_first_name, :spouse_father_name, :spouse_grandfather_name,
            :old_passport_number, :old_issue_date, :old_expiry_date,
            :has_correction, :correction_type,
            :old_passport_attachment, :photo_attachment, :id_front_attachment, :id_back_attachment, :police_assurance,
            :pageNo, :application_no, :registered_date
        )");

        // Bind parameters
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':category', $data['category']);

        // Site data
        $stmt->bindParam(':site', $data['siteData']['site']);
        $stmt->bindParam(':city', $data['siteData']['city']);
        $stmt->bindParam(':office', $data['siteData']['office']);
        $stmt->bindParam(':delivery', $data['siteData']['delivery']);

        // Appointment data
        $stmt->bindParam(':appointment_date', $data['dateTime']['date']);
        $stmt->bindParam(':appointment_time', $data['dateTime']['time']);

        // Personal info
        $stmt->bindParam(':firstname', $data['personalInfo']['firstname']);
        $stmt->bindParam(':middlename', $data['personalInfo']['middlename']);
        $stmt->bindParam(':lastname', $data['personalInfo']['lastname']);
        $stmt->bindParam(':phone', $data['personalInfo']['phone']);
        $stmt->bindParam(':email', $data['personalInfo']['email']);
        $stmt->bindParam(':gender', $data['personalInfo']['gender']);
        $stmt->bindParam(':dob', $data['personalInfo']['dob']);
        $stmt->bindParam(':under18', $data['personalInfo']['under18']);
        $stmt->bindParam(':birthplace', $data['personalInfo']['birthplace']);
        $stmt->bindParam(':adopted', $data['personalInfo']['adopted']);
        $stmt->bindParam(':birth_certificate', $data['personalInfo']['birth_certificate']);
        $stmt->bindParam(':nationality', $data['personalInfo']['nationality']);
        $stmt->bindParam(':marital_status', $data['personalInfo']['marital_status']);
        $stmt->bindParam(':occupation', $data['personalInfo']['occupation']);

        // Address data
        $stmt->bindParam(':region', $data['addressData']['region']);
        $stmt->bindParam(':address_city', $data['addressData']['city']);
        $stmt->bindParam(':subcity', $data['addressData']['subcity']);
        $stmt->bindParam(':woreda', $data['addressData']['woreda']);
        $stmt->bindParam(':kebele', $data['addressData']['kebele']);
        $stmt->bindParam(':house_no', $data['addressData']['house_no']);
        $stmt->bindParam(':id_no', $data['addressData']['id_no']);

        // Family data
        $stmt->bindParam(':mother_first_name', $data['family']['mother']['first_name']);
        $stmt->bindParam(':mother_father_name', $data['family']['mother']['father_name']);
        $stmt->bindParam(':mother_grandfather_name', $data['family']['mother']['grandfather_name']);
        $stmt->bindParam(':father_first_name', $data['family']['father']['first_name']);
        $stmt->bindParam(':father_father_name', $data['family']['father']['father_name']);
        $stmt->bindParam(':father_grandfather_name', $data['family']['father']['grandfather_name']);
        $stmt->bindParam(':spouse_first_name', $data['family']['spouse']['first_name']);
        $stmt->bindParam(':spouse_father_name', $data['family']['spouse']['father_name']);
        $stmt->bindParam(':spouse_grandfather_name', $data['family']['spouse']['grandfather_name']);

        // Passport info
        $stmt->bindParam(':old_passport_number', $data['PassportInfo']['old_passport_number']);
        $stmt->bindParam(':old_issue_date', $data['PassportInfo']['old_issue_date']);
        $stmt->bindParam(':old_expiry_date', $data['PassportInfo']['old_expiry_date']);
        $stmt->bindParam(':has_correction', $data['PassportInfo']['has_correction']);
        $stmt->bindParam(':correction_type', $data['PassportInfo']['correction_type']);

        // Additional attachment for lost passport
        $stmt->bindParam(':police_assurance', $data['attachments']['police_assurance']);
        // Other data
        $stmt->bindParam(':pageNo', $data['pageNo']);
        $stmt->bindParam(':application_no', $data['Registered']['applicationNumber']);
        $stmt->bindParam(':registered_date', $data['Registered']['registrationDate']);
        $stmt->execute();

        return ['success' => true, 'message' => 'Lost application saved successfully'];
    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
    }
}
function saveCorrectionApplication($data)
{
    try {
        $conn = getDatabaseConnection();

        $stmt = $conn->prepare("INSERT INTO Correction_Application (
            application_type, category,
            site, city, office, delivery_site,
            appointment_date, appointment_time,
            firstname, middlename, lastname, phone, email,
            gender, dob, under18, birthplace, adopted, birth_certificate, nationality,
            marital_status, occupation,
            region, address_city, subcity, woreda, kebele, house_no, id_no,
            mother_first_name, mother_father_name, mother_grandfather_name,
            father_first_name, father_father_name, father_grandfather_name,
            spouse_first_name, spouse_father_name, spouse_grandfather_name,
            old_passport_number, old_issue_date, old_expiry_date, correction_type,
            old_passport_attachment, photo_attachment, id_front_attachment, id_back_attachment,
            pageNo, application_no, registered_date
        ) VALUES (
            :type, :category,
            :site, :city, :office, :delivery,
            :appointment_date, :appointment_time,
            :firstname, :middlename, :lastname, :phone, :email,
            :gender, :dob, :under18, :birthplace, :adopted, :birth_certificate, :nationality,
            :marital_status, :occupation,
            :region, :address_city, :subcity, :woreda, :kebele, :house_no, :id_no,
            :mother_first_name, :mother_father_name, :mother_grandfather_name,
            :father_first_name, :father_father_name, :father_grandfather_name,
            :spouse_first_name, :spouse_father_name, :spouse_grandfather_name,
            :old_passport_number, :old_issue_date, :old_expiry_date, :correction_type,
            :old_passport_attachment, :photo_attachment, :id_front_attachment, :id_back_attachment,
            :pageNo, :application_no, :registered_date
        )");

        // Bind parameters
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':category', $data['category']);

        // Site data
        $stmt->bindParam(':site', $data['siteData']['site']);
        $stmt->bindParam(':city', $data['siteData']['city']);
        $stmt->bindParam(':office', $data['siteData']['office']);
        $stmt->bindParam(':delivery', $data['siteData']['delivery']);

        // Appointment data
        $stmt->bindParam(':appointment_date', $data['dateTime']['date']);
        $stmt->bindParam(':appointment_time', $data['dateTime']['time']);

        // Personal info
        $stmt->bindParam(':firstname', $data['personalInfo']['firstname']);
        $stmt->bindParam(':middlename', $data['personalInfo']['middlename']);
        $stmt->bindParam(':lastname', $data['personalInfo']['lastname']);
        $stmt->bindParam(':phone', $data['personalInfo']['phone']);
        $stmt->bindParam(':email', $data['personalInfo']['email']);
        $stmt->bindParam(':gender', $data['personalInfo']['gender']);
        $stmt->bindParam(':dob', $data['personalInfo']['dob']);
        $stmt->bindParam(':under18', $data['personalInfo']['under18']);
        $stmt->bindParam(':birthplace', $data['personalInfo']['birthplace']);
        $stmt->bindParam(':adopted', $data['personalInfo']['adopted']);
        $stmt->bindParam(':birth_certificate', $data['personalInfo']['birth_certificate']);
        $stmt->bindParam(':nationality', $data['personalInfo']['nationality']);
        $stmt->bindParam(':marital_status', $data['personalInfo']['marital_status']);
        $stmt->bindParam(':occupation', $data['personalInfo']['occupation']);

        // Address data
        $stmt->bindParam(':region', $data['addressData']['region']);
        $stmt->bindParam(':address_city', $data['addressData']['city']);
        $stmt->bindParam(':subcity', $data['addressData']['subcity']);
        $stmt->bindParam(':woreda', $data['addressData']['woreda']);
        $stmt->bindParam(':kebele', $data['addressData']['kebele']);
        $stmt->bindParam(':house_no', $data['addressData']['house_no']);
        $stmt->bindParam(':id_no', $data['addressData']['id_no']);

        // Family data
        $stmt->bindParam(':mother_first_name', $data['family']['mother']['first_name']);
        $stmt->bindParam(':mother_father_name', $data['family']['mother']['father_name']);
        $stmt->bindParam(':mother_grandfather_name', $data['family']['mother']['grandfather_name']);
        $stmt->bindParam(':father_first_name', $data['family']['father']['first_name']);
        $stmt->bindParam(':father_father_name', $data['family']['father']['father_name']);
        $stmt->bindParam(':father_grandfather_name', $data['family']['father']['grandfather_name']);
        $stmt->bindParam(':spouse_first_name', $data['family']['spouse']['first_name']);
        $stmt->bindParam(':spouse_father_name', $data['family']['spouse']['father_name']);
        $stmt->bindParam(':spouse_grandfather_name', $data['family']['spouse']['grandfather_name']);
        // Correction-specific fields
        $stmt->bindParam(':correction_type', $data['PassportInfo']['correction_type']);
        // Other data
        $stmt->bindParam(':pageNo', $data['pageNo']);
        $stmt->bindParam(':application_no', $data['Registered']['applicationNumber']);
        $stmt->bindParam(':registered_date', $data['Registered']['registrationDate']);
        $stmt->execute();

        return ['success' => true, 'message' => 'Correction application saved successfully'];
    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
    }
}
