<?php
namespace Admin\Models;

use PDO;
use Exception;

class Admin
{
    private $pdo;

    public function __construct()
    {
        // Use your DatabaseConfig class to get PDO connection
        $this->pdo = \DatabaseConfig::getDatabaseConnection();
    }

    /**
     * Get admin record by username
     *
     * @param string $username
     * @return array|null
     */
    public function getAdminByUsername(string $username): ?array
    {
        $sql = "SELECT * FROM admins WHERE username = :username LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username' => $username]);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        return $admin ?: null;
    }
}
