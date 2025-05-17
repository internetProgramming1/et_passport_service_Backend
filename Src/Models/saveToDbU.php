<?php
require __DIR__ . '/../../config/db.php';


function saveUrgentLostApplication($data)
{
    try {
        $conn = getDatabaseConnection(); // Your database connection function
        $stmt = $conn->prepare("INSERT INTO Urgent_Lost_Application (
                application_type, category, urgency,
                site_city, site_office, delivery_site, delivery_date,
                first_name, middle_name, last_name, phone, email, gender, dob,
                age_category, birthplace, adoption_status, birth_certificate_no,
                nationality, marital_status, occupation,
                region, city, subcity, woreda, kebele, house_no, id_number,
                mother_first_name, mother_father_name, mother_grandfather_name,
                father_first_name, father_father_name, father_grandfather_name,
                spouse_first_name, spouse_father_name, spouse_grandfather_name,
                birth_certificate_front, birth_certificate_back, id_front, id_back,
                page_number, registrationDate, applicationNumber,
                application_status
            ) VALUES (
                :type, :category, :urgency,
                :site_city, :site_office, :delivery_site, :delivery_date,
                :first_name, :middle_name, :last_name, :phone, :email, :gender, :dob,
                :age_category, :birthplace, :adoption_status, :birth_certificate_no,
                :nationality, :marital_status, :occupation,
                :region, :city, :subcity, :woreda, :kebele, :house_no, :id_number,
                :mother_first_name, :mother_father_name, :mother_grandfather_name,
                :father_first_name, :father_father_name, :father_grandfather_name,
                :spouse_first_name, :spouse_father_name, :spouse_grandfather_name,
                :birth_certificate_front, :birth_certificate_back, :id_front, :id_back,
                :page_number, :registrationDate, :applicationNumber,
                'pending'
            )
        ");

        // Bind parameters
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':urgency', $data['urgency']);

        // Site data
        $stmt->bindParam(':site_city', $data['siteData']['city']);
        $stmt->bindParam(':site_office', $data['siteData']['office']);
        $stmt->bindParam(':delivery_site', $data['siteData']['delivery']);
        $stmt->bindParam(':delivery_date', $data['deliveryDate']);

        // Personal info
        $stmt->bindParam(':first_name', $data['personalInfo']['firstname']);
        $stmt->bindParam(':middle_name', $data['personalInfo']['middlename']);
        $stmt->bindParam(':last_name', $data['personalInfo']['lastname']);
        $stmt->bindParam(':phone', $data['personalInfo']['phone']);
        $stmt->bindParam(':email', $data['personalInfo']['email']);
        $stmt->bindParam(':gender', $data['personalInfo']['gender']);
        $stmt->bindParam(':dob', $data['personalInfo']['dob']);
        $stmt->bindParam(':age_category', $data['personalInfo']['under18']);
        $stmt->bindParam(':birthplace', $data['personalInfo']['birthplace']);
        $stmt->bindParam(':adoption_status', $data['personalInfo']['adopted']);
        $stmt->bindParam(':birth_certificate_no', $data['personalInfo']['birth_certificate']);
        $stmt->bindParam(':nationality', $data['personalInfo']['nationality']);
        $stmt->bindParam(':marital_status', $data['personalInfo']['marital_status']);
        $stmt->bindParam(':occupation', $data['personalInfo']['occupation']);

        // Address
        $stmt->bindParam(':region', $data['addressData']['region']);
        $stmt->bindParam(':city', $data['addressData']['city']);
        $stmt->bindParam(':subcity', $data['addressData']['subcity']);
        $stmt->bindParam(':woreda', $data['addressData']['woreda']);
        $stmt->bindParam(':kebele', $data['addressData']['kebele']);
        $stmt->bindParam(':house_no', $data['addressData']['house_no']);
        $stmt->bindParam(':id_number', $data['addressData']['id_no']);

        // Family
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
        $stmt->bindParam(':birth_certificate_front', $data['attachments']['birth_cer_front']);
        $stmt->bindParam(':birth_certificate_back', $data['attachments']['birth_cer_back']);
        $stmt->bindParam(':id_front', $data['attachments']['id_front']);
        $stmt->bindParam(':id_back', $data['attachments']['id_back']);

        // Other
        $stmt->bindParam(':page_number', $data['pageNo']);
        $stmt->bindParam(':registrationDate', $data['Registered']['registrationDate']);
        $stmt->bindParam(':applicationNumber', $data['Registered']['applicationNumber']);

        // Execute and return true if successful
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function saveUrgentCorrectionApplication($data)
{
    $conn = getDatabaseConnection(); // Your database connection function

    try {
        $stmt = $conn->prepare("
            INSERT INTO Urgent_Correction_Application (
                application_type, category, urgency,
                site_city, site_office, delivery_site, delivery_date,
                first_name, middle_name, last_name, phone, email, gender, dob,
                age_category, birthplace, adoption_status, birth_certificate_no,
                nationality, marital_status, occupation,
                region, city, subcity, woreda, kebele, house_no, id_number,
                mother_first_name, mother_father_name, mother_grandfather_name,
                father_first_name, father_father_name, father_grandfather_name,
                spouse_first_name, spouse_father_name, spouse_grandfather_name,
                old_passport_number, old_issue_date, old_expiry_date, correction_type,
                old_passport_attachment, photo_attachment, id_front_attachment, id_back_attachment,
                page_number, registrationDate, applicationNumber,
                application_status
            ) VALUES (
                :type, :category, :urgency,
                :site_city, :site_office, :delivery_site, :delivery_date,
                :first_name, :middle_name, :last_name, :phone, :email, :gender, :dob,
                :age_category, :birthplace, :adoption_status, :birth_certificate_no,
                :nationality, :marital_status, :occupation,
                :region, :city, :subcity, :woreda, :kebele, :house_no, :id_number,
                :mother_first_name, :mother_father_name, :mother_grandfather_name,
                :father_first_name, :father_father_name, :father_grandfather_name,
                :spouse_first_name, :spouse_father_name, :spouse_grandfather_name,
                :old_passport_number, :old_issue_date, :old_expiry_date, :correction_type,
                :old_passport_attachment, :photo_attachment, :id_front_attachment, :id_back_attachment,
                :page_number, :registrationDate, :applicationNumber,
                'pending'
            )
        ");

        // Bind parameters
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':urgency', $data['urgency']);

        // Site data
        $stmt->bindParam(':site_city', $data['siteData']['city']);
        $stmt->bindParam(':site_office', $data['siteData']['office']);
        $stmt->bindParam(':delivery_site', $data['siteData']['delivery']);
        $stmt->bindParam(':delivery_date', $data['deliveryDate']);

        // Personal info
        $stmt->bindParam(':first_name', $data['personalInfo']['firstname']);
        $stmt->bindParam(':middle_name', $data['personalInfo']['middlename']);
        $stmt->bindParam(':last_name', $data['personalInfo']['lastname']);
        $stmt->bindParam(':phone', $data['personalInfo']['phone']);
        $stmt->bindParam(':email', $data['personalInfo']['email']);
        $stmt->bindParam(':gender', $data['personalInfo']['gender']);
        $stmt->bindParam(':dob', $data['personalInfo']['dob']);
        $stmt->bindParam(':age_category', $data['personalInfo']['under18']);
        $stmt->bindParam(':birthplace', $data['personalInfo']['birthplace']);
        $stmt->bindParam(':adoption_status', $data['personalInfo']['adopted']);
        $stmt->bindParam(':birth_certificate_no', $data['personalInfo']['birth_certificate']);
        $stmt->bindParam(':nationality', $data['personalInfo']['nationality']);
        $stmt->bindParam(':marital_status', $data['personalInfo']['marital_status']);
        $stmt->bindParam(':occupation', $data['personalInfo']['occupation']);

        // Address
        $stmt->bindParam(':region', $data['addressData']['region']);
        $stmt->bindParam(':city', $data['addressData']['city']);
        $stmt->bindParam(':subcity', $data['addressData']['subcity']);
        $stmt->bindParam(':woreda', $data['addressData']['woreda']);
        $stmt->bindParam(':kebele', $data['addressData']['kebele']);
        $stmt->bindParam(':house_no', $data['addressData']['house_no']);
        $stmt->bindParam(':id_number', $data['addressData']['id_no']);

        // Family
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
        $stmt->bindParam(':correction_type', $data['PassportInfo']['correction_type']);

        // Attachments
        $stmt->bindParam(':old_passport_attachment', $data['attachments']['old_Passport']);
        $stmt->bindParam(':photo_attachment', $data['attachments']['photo']);
        $stmt->bindParam(':id_front_attachment', $data['attachments']['id_front']);
        $stmt->bindParam(':id_back_attachment', $data['attachments']['id_back']);

        // Other
        $stmt->bindParam(':page_number', $data['pageNo']);
        $stmt->bindParam(':registrationDate', $data['Registered']['registrationDate']);
        $stmt->bindParam(':applicationNumber', $data['Registered']['applicationNumber']);

        // Execute and return true if successful
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Database error saving correction application: " . $e->getMessage());
        return false;
    }
}


function saveUrgentRenewalApplication($data)
{
    $conn = getDatabaseConnection();

    try {
        $stmt = $conn->prepare("
            INSERT INTO Urgent_Renewal_Application (
                application_type, category, urgency, service_type,
                site_city, site_office, delivery_site, delivery_date,
                first_name, middle_name, last_name, phone, email, gender, dob,
                age_category, birthplace, adoption_status, birth_certificate_no,
                nationality, marital_status, occupation,
                region, city, subcity, woreda, kebele, house_no, id_number,
                mother_first_name, mother_father_name, mother_grandfather_name,
                father_first_name, father_father_name, father_grandfather_name,
                spouse_first_name, spouse_father_name, spouse_grandfather_name,
                old_passport_number, old_issue_date, old_expiry_date, 
                has_correction, correction_type,
                old_passport_attachment, photo_attachment, id_front_attachment, id_back_attachment,
                page_number, registrationDate, applicationNumber,
                application_status
            ) VALUES (
                :type, :category, :urgency, :service_type,
                :site_city, :site_office, :delivery_site, :delivery_date,
                :first_name, :middle_name, :last_name, :phone, :email, :gender, :dob,
                :age_category, :birthplace, :adoption_status, :birth_certificate_no,
                :nationality, :marital_status, :occupation,
                :region, :city, :subcity, :woreda, :kebele, :house_no, :id_number,
                :mother_first_name, :mother_father_name, :mother_grandfather_name,
                :father_first_name, :father_father_name, :father_grandfather_name,
                :spouse_first_name, :spouse_father_name, :spouse_grandfather_name,
                :old_passport_number, :old_issue_date, :old_expiry_date,
                :has_correction, :correction_type,
                :old_passport_attachment, :photo_attachment, :id_front_attachment, :id_back_attachment,
                :page_number, :registrationDate, :applicationNumber,
                'pending'
            )
        ");

        // Bind parameters
        // Application Info
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':urgency', $data['urgency']);
        $stmt->bindParam(':service_type', $data['serviceType']);

        // Site Data
        $stmt->bindParam(':site_city', $data['siteData']['city']);
        $stmt->bindParam(':site_office', $data['siteData']['office']);
        $stmt->bindParam(':delivery_site', $data['siteData']['delivery']);
        $stmt->bindParam(':delivery_date', $data['deliveryDate']);

        // Personal Info
        $stmt->bindParam(':first_name', $data['personalInfo']['firstname']);
        $stmt->bindParam(':middle_name', $data['personalInfo']['middlename']);
        $stmt->bindParam(':last_name', $data['personalInfo']['lastname']);
        $stmt->bindParam(':phone', $data['personalInfo']['phone']);
        $stmt->bindParam(':email', $data['personalInfo']['email']);
        $stmt->bindParam(':gender', $data['personalInfo']['gender']);
        $stmt->bindParam(':dob', $data['personalInfo']['dob']);
        $stmt->bindParam(':age_category', $data['personalInfo']['under18']);
        $stmt->bindParam(':birthplace', $data['personalInfo']['birthplace']);
        $stmt->bindParam(':adoption_status', $data['personalInfo']['adopted']);
        $stmt->bindParam(':birth_certificate_no', $data['personalInfo']['birth_certificate']);
        $stmt->bindParam(':nationality', $data['personalInfo']['nationality']);
        $stmt->bindParam(':marital_status', $data['personalInfo']['marital_status']);
        $stmt->bindParam(':occupation', $data['personalInfo']['occupation']);

        // Address
        $stmt->bindParam(':region', $data['addressData']['region']);
        $stmt->bindParam(':city', $data['addressData']['city']);
        $stmt->bindParam(':subcity', $data['addressData']['subcity']);
        $stmt->bindParam(':woreda', $data['addressData']['woreda']);
        $stmt->bindParam(':kebele', $data['addressData']['kebele']);
        $stmt->bindParam(':house_no', $data['addressData']['house_no']);
        $stmt->bindParam(':id_number', $data['addressData']['id_no']);

        // Family
        $stmt->bindParam(':mother_first_name', $data['family']['mother']['first_name']);
        $stmt->bindParam(':mother_father_name', $data['family']['mother']['father_name']);
        $stmt->bindParam(':mother_grandfather_name', $data['family']['mother']['grandfather_name']);
        $stmt->bindParam(':father_first_name', $data['family']['father']['first_name']);
        $stmt->bindParam(':father_father_name', $data['family']['father']['father_name']);
        $stmt->bindParam(':father_grandfather_name', $data['family']['father']['grandfather_name']);
        $sFn = $data['family']['spouse']['first_name'] ?? null;
        $sMn = $data['family']['spouse']['father_name'] ?? null;
        $sLn = $data['family']['spouse']['grandfather_name'] ?? null;
        $stmt->bindParam(':spouse_first_name', $sFn);
        $stmt->bindParam(':spouse_father_name', $sMn);
        $stmt->bindParam(':spouse_grandfather_name',  $sLn);

        // Passport Info
        $stmt->bindParam(':old_passport_number', $data['PassportInfo']['old_passport_number']);
        $stmt->bindParam(':old_issue_date', $data['PassportInfo']['old_issue_date']);
        $stmt->bindParam(':old_expiry_date', $data['PassportInfo']['old_expiry_date']);
        $stmt->bindParam(':has_correction', $data['PassportInfo']['has_correction'], PDO::PARAM_BOOL);
        $stmt->bindParam(':correction_type', $data['PassportInfo']['correction_type']);

        // Attachments
        $stmt->bindParam(':old_passport_attachment', $data['attachments']['old_Passport']);
        $stmt->bindParam(':photo_attachment', $data['attachments']['photo']);
        $stmt->bindParam(':id_front_attachment', $data['attachments']['id_front']);
        $stmt->bindParam(':id_back_attachment', $data['attachments']['id_back']);

        // Other
        $stmt->bindParam(':page_number', $data['pageNo']);
        $stmt->bindParam(':registrationDate', $data['Registered']['registrationDate']);
        $stmt->bindParam(':applicationNumber', $data['Registered']['applicationNumber']);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Database error saving renewal application: " . $e->getMessage());
        return false;
    }
}

function saveUrgentNewApplication($data)
{
    $conn = getDatabaseConnection();

    try {
        $stmt = $conn->prepare("INSERT INTO Urgent_New_Application (
                application_type, category, urgency,
                site_city, site_office, delivery_site, delivery_date,
                first_name, middle_name, last_name, phone, email, gender, dob,
                age_category, birthplace, adoption_status, birth_certificate_no,
                nationality, marital_status, occupation,
                region, city, subcity, woreda, kebele, house_no, id_number,
                mother_first_name, mother_father_name, mother_grandfather_name,
                father_first_name, father_father_name, father_grandfather_name,
                spouse_first_name, spouse_father_name, spouse_grandfather_name,
                birth_certificate_front, birth_certificate_back, id_front, id_back,
                page_number, registrationDate, applicationNumber,
                application_status
            ) VALUES (
                :type, :category, :urgency,
                :site_city, :site_office, :delivery_site, :delivery_date,
                :first_name, :middle_name, :last_name, :phone, :email, :gender, :dob,
                :age_category, :birthplace, :adoption_status, :birth_certificate_no,
                :nationality, :marital_status, :occupation,
                :region, :city, :subcity, :woreda, :kebele, :house_no, :id_number,
                :mother_first_name, :mother_father_name, :mother_grandfather_name,
                :father_first_name, :father_father_name, :father_grandfather_name,
                :spouse_first_name, :spouse_father_name, :spouse_grandfather_name,
                :birth_certificate_front, :birth_certificate_back, :id_front, :id_back,
                :page_number, :registrationDate, :applicationNumber,
                'pending'
            )
        ");

        // Bind parameters
        // Application Info
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':urgency', $data['urgency']);

        // Site Data
        $stmt->bindParam(':site_city', $data['siteData']['city']);
        $stmt->bindParam(':site_office', $data['siteData']['office']);
        $stmt->bindParam(':delivery_site', $data['siteData']['delivery']);
        $stmt->bindParam(':delivery_date', $data['deliveryDate']);

        // Personal Info
        $stmt->bindParam(':first_name', $data['personalInfo']['firstname']);
        $stmt->bindParam(':middle_name', $data['personalInfo']['middlename']);
        $stmt->bindParam(':last_name', $data['personalInfo']['lastname']);
        $stmt->bindParam(':phone', $data['personalInfo']['phone']);
        $stmt->bindParam(':email', $data['personalInfo']['email']);
        $stmt->bindParam(':gender', $data['personalInfo']['gender']);
        $stmt->bindParam(':dob', $data['personalInfo']['dob']);
        $stmt->bindParam(':age_category', $data['personalInfo']['under18']);
        $stmt->bindParam(':birthplace', $data['personalInfo']['birthplace']);
        $stmt->bindParam(':adoption_status', $data['personalInfo']['adopted']);
        $stmt->bindParam(':birth_certificate_no', $data['personalInfo']['birth_certificate']);
        $stmt->bindParam(':nationality', $data['personalInfo']['nationality']);
        $stmt->bindParam(':marital_status', $data['personalInfo']['marital_status']);
        $stmt->bindParam(':occupation', $data['personalInfo']['occupation']);

        // Address
        $stmt->bindParam(':region', $data['addressData']['region']);
        $stmt->bindParam(':city', $data['addressData']['city']);
        $stmt->bindParam(':subcity', $data['addressData']['subcity']);
        $stmt->bindParam(':woreda', $data['addressData']['woreda']);
        $stmt->bindParam(':kebele', $data['addressData']['kebele']);
        $stmt->bindParam(':house_no', $data['addressData']['house_no']);
        $stmt->bindParam(':id_number', $data['addressData']['id_no']);

        // Family
        $stmt->bindParam(':mother_first_name', $data['family']['mother']['first_name']);
        $stmt->bindParam(':mother_father_name', $data['family']['mother']['father_name']);
        $stmt->bindParam(':mother_grandfather_name', $data['family']['mother']['grandfather_name']);
        $stmt->bindParam(':father_first_name', $data['family']['father']['first_name']);
        $stmt->bindParam(':father_father_name', $data['family']['father']['father_name']);
        $stmt->bindParam(':father_grandfather_name', $data['family']['father']['grandfather_name']);
        $sFn = $data['family']['spouse']['first_name'] ?? null;
        $sMn = $data['family']['spouse']['father_name'] ?? null;
        $sLn = $data['family']['spouse']['grandfather_name'] ?? null;
        $stmt->bindParam(':spouse_first_name', $sFn);
        $stmt->bindParam(':spouse_father_name', $sMn);
        $stmt->bindParam(':spouse_grandfather_name',  $sLn);

        // Attachments
        $stmt->bindParam(':birth_certificate_front', $data['attachments']['birth_cer_front']);
        $stmt->bindParam(':birth_certificate_back', $data['attachments']['birth_cer_back']);
        $stmt->bindParam(':id_front', $data['attachments']['id_front']);
        $stmt->bindParam(':id_back', $data['attachments']['id_back']);

        // Other
        $stmt->bindParam(':page_number', $data['pageNo']);
        $stmt->bindParam(':registrationDate', $data['Registered']['registrationDate']);
        $stmt->bindParam(':applicationNumber', $data['Registered']['applicationNumber']);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Database error saving new application: " . $e->getMessage());
        return false;
    }
}
