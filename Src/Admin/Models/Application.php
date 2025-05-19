<?php
require_once __DIR__ . '/../../../Config/db.php';

class ApplicationModel
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
    }

    public function getStatusCounts()
    {
        $tables = [
            'renewal_application',
            'urgent_renewal_application',
            'new_application',
            'urgent_new_application',
            'lost_application',
            'urgent_lost_application',
            'correction_application',
            'urgent_correction_application'
        ];

        $results = [];
        foreach ($tables as $table) {
            $stmt = $this->pdo->prepare("
                SELECT application_status, COUNT(*) as count 
                FROM $table 
                GROUP BY application_status
            ");
            $stmt->execute();
            $results[$table] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    public function getApplications($table, $status = null, $limit = 5)
    {
        $allowedTables = [
            'renewal_application',
            'urgent_renewal_application',
            'new_application',
            'urgent_new_application',
            'lost_application',
            'urgent_lost_application',
            'correction_application',
            'urgent_correction_application'
        ];

        if (!in_array($table, $allowedTables)) {
            throw new InvalidArgumentException("Invalid table name");
        }

        $sql = "SELECT * FROM $table";
        $params = [];

        if ($status) {
            $sql .= " WHERE application_status = :status";
            $params[':status'] = $status;
        }

        $sql .= " ORDER BY created_at DESC LIMIT :limit";
        $params[':limit'] = $limit;

        $stmt = $this->pdo->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
