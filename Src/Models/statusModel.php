<?php

require_once __DIR__ . '/../../Config/db.php';

class StatusModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
    }

    private $tables = [
        'renewal_application',
        'urgent_renewal_application',
        'new_application',
        'urgent_new_application',
        'lost_application',
        'urgent_lost_application',
        'correction_application',
        'urgent_correction_application'
    ];



    public function findStatus($appNo)
    {
        foreach ($this->tables as $table) {
            // Check if 'application_no' exists in table
            $columnCheck = $this->pdo->prepare("SHOW COLUMNS FROM `$table` LIKE 'application_no'");
            $columnCheck->execute();
            if (!$columnCheck->fetch()) {
                continue; // Skip table if column does not exist
            }

            $stmt = $this->pdo->prepare("SELECT application_status, created_at FROM `$table` WHERE application_no = ?");
            $stmt->execute([$appNo]);
            $result = $stmt->fetch();
            if ($result) {
                return [
                    'table' => $table,
                    'status' => $result['application_status'],
                    'created_at' => $result['created_at']
                ];
            }
        }

        return null;
    }
}
