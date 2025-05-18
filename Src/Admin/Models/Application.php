<?php
require_once __DIR__ . '/../../../config/db.php';

class Application
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getApplications($category, $table)
    {
        // Validate table name
        if (!$this->isValidTable($table)) {
            throw new InvalidArgumentException("Invalid table name");
        }

        $query = "SELECT * FROM $table";
        $params = [];

        if ($category) {
            $query .= " WHERE category = ?";
            $params[] = $category;
        }

        $query .= " ORDER BY created_at DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function isValidTable($tableName)
    {
        // Only allow specific table names
        $validTables = [
            'new_application',
            'renewal_application',
            'lost_application',
            'correction_application'
        ];

        return in_array($tableName, $validTables);
    }
}
