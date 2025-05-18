<?php

namespace Admin\Models;

require_once __DIR__ . '/../../../config/db.php';

class Application
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
    }

    public function getAllApplications()
    {
        $stmt = $this->pdo->query("SELECT * FROM applications");
        return $stmt->fetchAll();
    }

    public function getApplicationsByType($type)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM applications WHERE type = :type");
        $stmt->execute(['type' => $type]);
        return $stmt->fetchAll();
    }
}
