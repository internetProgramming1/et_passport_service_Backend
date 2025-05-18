<?php
require_once __DIR__ . '/../../../Config/db.php';

class RenewalApplicationModel
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
        $stmt = $this->pdo->prepare("SELECT * FROM urgent_renewal_application");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get normal applications from new_application table
     */
    public function getNormalData(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM renewal_application");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
