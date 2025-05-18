<?php
require_once __DIR__ . '/../../../Config/db.php';

class LostApplicationModel
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
        $stmt = $this->pdo->prepare("SELECT * FROM urgent_lost_application");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get normal applications from new_application table
     */
    public function getNormalData(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM lost_application");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
