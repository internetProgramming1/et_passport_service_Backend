<?php
require_once __DIR__ . '/../../../Config/db.php';

class CorrectionApplicationModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
    }

    /**
     * Get urgent applications from urgent_new_application table
     */
    public function getUrgentData(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM urgent_correction_application");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get normal applications from new_application table
     */
    public function getNormalData(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM correction_application");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getApplicationNo($appNo)
    {
        // 1. Search in urgent_renewal_application first
        $stmt = $this->pdo->prepare("SELECT * FROM correction_application WHERE application_no = ?");
        $stmt->execute([$appNo]);
        $urgentResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($urgentResult)) {
            return $urgentResult;
        }

        // 2. If not found, check in renewal_application
        $stmt = $this->pdo->prepare("SELECT * FROM urgent_correction_application WHERE applicationNumber = ?");
        $stmt->execute([$appNo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status)
    {
        try {
            // Validate status input
            $validStatuses = ['pending', 'approved', 'rejected', 'info_requested'];
            if (!in_array($status, $validStatuses)) {
                throw new InvalidArgumentException("Invalid status provided");
            }

            // First try updating urgent applications
            $stmt = $this->pdo->prepare("
            UPDATE urgent_correction_application 
            SET application_status = :status, updated_at = NOW() 
            WHERE id = :id
        ");
            $stmt->execute([':status' => $status, ':id' => $id]);

            // If no rows affected, try normal applications
            if ($stmt->rowCount() === 0) {
                $stmt = $this->pdo->prepare("
                UPDATE correction_application 
                SET application_status = :status, updated_at = NOW() 
                WHERE id = :id
            ");
                $stmt->execute([':status' => $status, ':id' => $id]);

                if ($stmt->rowCount() === 0) {
                    throw new RuntimeException("No application found with ID $id");
                }
            }

            return true;
        } catch (PDOException $e) {
            error_log("Database error in updateStatus: " . $e->getMessage());
            throw new RuntimeException("Failed to update application status");
        }
    }
}
