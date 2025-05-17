<?php
namespace Admin\Models;

use PDO;

class Status
{
    private static function getDB()
    {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'] ?? '';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public static function getStatusesByApplicationId($applicationId)
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT * FROM statuses WHERE application_id = ? ORDER BY created_at ASC");
        $stmt->execute([$applicationId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
