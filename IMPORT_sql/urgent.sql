-- table for renewal
CREATE TABLE Urgent_Renewal_Application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- Application Type
    application_type VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    urgency VARCHAR(50) NOT NULL,
    service_type VARCHAR(50) NOT NULL,
    
    -- Site Information
    site_city VARCHAR(100) NOT NULL,
    site_office VARCHAR(100) NOT NULL,
    delivery_site VARCHAR(100) NOT NULL,
    delivery_date VARCHAR(50) NOT NULL,
    
    -- Personal Information
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    dob VARCHAR(50) NOT NULL,
    age_category VARCHAR(50) NOT NULL,
    birthplace VARCHAR(100) NOT NULL,
    adoption_status VARCHAR(50) NOT NULL,
    birth_certificate_no VARCHAR(50) NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    marital_status VARCHAR(50) NOT NULL,
    occupation VARCHAR(100) NOT NULL,
    
    -- Address Information
    region VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    subcity VARCHAR(100) NOT NULL,
    woreda VARCHAR(50) NOT NULL,
    kebele VARCHAR(100) NOT NULL,
    house_no VARCHAR(50) NOT NULL,
    id_number VARCHAR(50) NOT NULL,
    
    -- Family Information
    mother_first_name VARCHAR(50) NOT NULL,
    mother_father_name VARCHAR(50) NOT NULL,
    mother_grandfather_name VARCHAR(50) NOT NULL,
    father_first_name VARCHAR(50) NOT NULL,
    father_father_name VARCHAR(50) NOT NULL,
    father_grandfather_name VARCHAR(50) NOT NULL,
    spouse_first_name VARCHAR(50),
    spouse_father_name VARCHAR(50),
    spouse_grandfather_name VARCHAR(50),
    
    -- Passport Information
    old_passport_number VARCHAR(50),
    old_issue_date VARCHAR(50),
    old_expiry_date VARCHAR(50),
    has_correction BOOLEAN DEFAULT FALSE,
    correction_type VARCHAR(100),
    
    -- Attachments
    old_passport_attachment VARCHAR(255),
    photo_attachment VARCHAR(255),
    id_front_attachment VARCHAR(255),
    id_back_attachment VARCHAR(255),
    
    -- Additional Fields
    page_number VARCHAR(10),
    registrationDate VARCHAR(50),
    applicationNumber VARCHAR(50),
    
    -- System Fields
    application_status VARCHAR(100) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
-- table for lost
CREATE TABLE Urgent_Lost_Application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- Application Type
    application_type VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    urgency VARCHAR(50) NOT NULL,
    
    -- Site Information
    site_city VARCHAR(100) NOT NULL,
    site_office VARCHAR(100) NOT NULL,
    delivery_site VARCHAR(100) NOT NULL,
    delivery_date VARCHAR(50) NOT NULL,
    
    -- Personal Information
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    dob VARCHAR(50) NOT NULL,
    age_category VARCHAR(50) NOT NULL,
    birthplace VARCHAR(100) NOT NULL,
    adoption_status VARCHAR(50) NOT NULL,
    birth_certificate_no VARCHAR(50) NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    marital_status VARCHAR(50) NOT NULL,
    occupation VARCHAR(100) ,
    
    -- Address Information
    region VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    subcity VARCHAR(100) NOT NULL,
    woreda VARCHAR(50) NOT NULL,
    kebele VARCHAR(100) NOT NULL,
    house_no VARCHAR(50) NOT NULL,
    id_number VARCHAR(50) NOT NULL,
    
    -- Family Information
    mother_first_name VARCHAR(50) NOT NULL,
    mother_father_name VARCHAR(50) NOT NULL,
    mother_grandfather_name VARCHAR(50) NOT NULL,
    father_first_name VARCHAR(50) NOT NULL,
    father_father_name VARCHAR(50) NOT NULL,
    father_grandfather_name VARCHAR(50) NOT NULL,
    spouse_first_name VARCHAR(50),
    spouse_father_name VARCHAR(50),
    spouse_grandfather_name VARCHAR(50),
    
    -- Passport Information
    old_passport_number VARCHAR(50),
    old_issue_date VARCHAR(50),
    old_expiry_date VARCHAR(50),
    has_correction BOOLEAN DEFAULT FALSE,
    correction_type VARCHAR(50),
    
    -- Attachments
    old_passport_attachment VARCHAR(255),
    photo_attachment VARCHAR(255),
    id_front_attachment VARCHAR(255),
    id_back_attachment VARCHAR(255),
    police_assurance_attachment VARCHAR(255),

    -- For the new 
    page_number VARCHAR(10),
    registrationDate VARCHAR(50),
    applicationNumber VARCHAR(50),

    -- System Fields
    application_status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- TABLE FOR CORRECTION
CREATE TABLE Urgent_Correction_Application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- Application Type
    application_type VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    urgency VARCHAR(50) NOT NULL,
    
    -- Site Information
    site_city VARCHAR(100) NOT NULL,
    site_office VARCHAR(100) NOT NULL,
    delivery_site VARCHAR(100) NOT NULL,
    delivery_date DATE NOT NULL,
    
    -- Personal Information
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    dob VARCHAR(50) NOT NULL,
    age_category VARCHAR(50) NOT NULL,
    birthplace VARCHAR(100) NOT NULL,
    adoption_status VARCHAR(50) NOT NULL,
    birth_certificate_no VARCHAR(50) NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    marital_status VARCHAR(50) NOT NULL,
    occupation VARCHAR(100),
    
    -- Address Information
    region VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    subcity VARCHAR(100) NOT NULL,
    woreda VARCHAR(50) NOT NULL,
    kebele VARCHAR(100) NOT NULL,
    house_no VARCHAR(50) NOT NULL,
    id_number VARCHAR(50) NOT NULL,
    
    -- Family Information
    mother_first_name VARCHAR(50) NOT NULL,
    mother_father_name VARCHAR(50) NOT NULL,
    mother_grandfather_name VARCHAR(50) NOT NULL,
    father_first_name VARCHAR(50) NOT NULL,
    father_father_name VARCHAR(50) NOT NULL,
    father_grandfather_name VARCHAR(50) NOT NULL,
    spouse_first_name VARCHAR(50),
    spouse_father_name VARCHAR(50),
    spouse_grandfather_name VARCHAR(50),
    
    -- Passport Information
    old_passport_number VARCHAR(50),
    old_issue_date VARCHAR(50),
    old_expiry_date VARCHAR(50),
    correction_type VARCHAR(50),
    
    -- Attachments
    old_passport_attachment VARCHAR(255),
    photo_attachment VARCHAR(255),
    id_front_attachment VARCHAR(255),
    id_back_attachment VARCHAR(255),
    
    -- Additional Fields
    page_number VARCHAR(10),
    registrationDate VARCHAR(50),
    applicationNumber VARCHAR(50),
    
    -- System Fields
    application_status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table For New

CREATE TABLE Urgent_New_Application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- Application Type
    application_type VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    urgency VARCHAR(50) NOT NULL,
    
    -- Site Information
    site_city VARCHAR(100) NOT NULL,
    site_office VARCHAR(100) NOT NULL,
    delivery_site VARCHAR(100) NOT NULL,
    delivery_date VARCHAR(50) NOT NULL,
    
    -- Personal Information
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    dob VARCHAR(50) NOT NULL,
    age_category VARCHAR(50) NOT NULL,
    birthplace VARCHAR(100) NOT NULL,
    adoption_status VARCHAR(50) NOT NULL,
    birth_certificate_no VARCHAR(50) NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    marital_status VARCHAR(50) NOT NULL,
    occupation VARCHAR(100),
    
    -- Address Information
    region VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    subcity VARCHAR(100) NOT NULL,
    woreda VARCHAR(50) NOT NULL,
    kebele VARCHAR(100) NOT NULL,
    house_no VARCHAR(50) NOT NULL,
    id_number VARCHAR(50) NOT NULL,
    
    -- Family Information
    mother_first_name VARCHAR(50) NOT NULL,
    mother_father_name VARCHAR(50) NOT NULL,
    mother_grandfather_name VARCHAR(50) NOT NULL,
    father_first_name VARCHAR(50) NOT NULL,
    father_father_name VARCHAR(50) NOT NULL,
    father_grandfather_name VARCHAR(50) NOT NULL,
    spouse_first_name VARCHAR(50),
    spouse_father_name VARCHAR(50),
    spouse_grandfather_name VARCHAR(50),
    

    -- Attachments
   birth_certificate_front VARCHAR(255),
    birth_certificate_back VARCHAR(255),
    id_front VARCHAR(255),
    id_back VARCHAR(255),
    -- For the new 
    page_number VARCHAR(10),
    registrationDate VARCHAR(50),
    applicationNumber VARCHAR(50),
    -- System Fields
    application_status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

