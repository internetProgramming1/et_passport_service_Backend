<?php

namespace Admin\Models;

require_once __DIR__ . '/../../../config/db.php';

class Status
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
    }

    public function updateStatus($applicationId, $status)
    {
        $stmt = $this->pdo->prepare("UPDATE applications SET status = :status WHERE id = :id");
        return $stmt->execute(['status' => $status, 'id' => $applicationId]);
    }

    public function getStatus($applicationId)
    {
        $stmt = $this->pdo->prepare("SELECT status FROM applications WHERE id = :id");
        $stmt->execute(['id' => $applicationId]);
        return $stmt->fetchColumn();
    }
}
