CREATE TABLE IF NOT EXISTS urgent_appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    applicant_name VARCHAR(255) NOT NULL,
    reason TEXT,
    appointment_date DATE NOT NULL,
    tracking_id VARCHAR(255) UNIQUE
);
