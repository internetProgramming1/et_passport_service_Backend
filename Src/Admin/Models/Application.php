<?php
namespace Admin\Models;

use PDO;

class Application
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

    public static function getNewApplications()
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT * FROM applications WHERE type = 'new' ORDER BY date_created DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getRenewalApplications()
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT * FROM applications WHERE type = 'renewal' ORDER BY date_created DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getLostApplications()
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT * FROM applications WHERE type = 'lost' ORDER BY date_created DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCorrectionApplications()
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT * FROM applications WHERE type = 'correction' ORDER BY date_created DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT * FROM applications WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
