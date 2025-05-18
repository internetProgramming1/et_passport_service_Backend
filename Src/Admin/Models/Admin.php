<?php

namespace Admin\Models;

require_once __DIR__ . '/../../../config/db.php';

class Admin
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
    }

    public function findByUsername($username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch();
    }
}
