<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

class DatabaseConfig
{
    private static $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    /**
     * Get a PDO database connection
     * 
     * @return PDO
     * @throws PDOException If connection fails
     */
    public static function getDatabaseConnection()
    {
        // Load environment variables
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $dotenv->required(['DB_HOST', 'DB_DATABASE', 'DB_USERNAME'])->notEmpty();

        // Create DSN string

        $dsn = "mysql:host={$_ENV['DB_HOST']};" .
            "port={$_ENV['DB_PORT']};" .
            "dbname={$_ENV['DB_DATABASE']};" .
            "charset={$_ENV['DB_CHARSET']}";


        try {
            return new PDO(
                $dsn,
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD'] ?? '',
                self::$options
            );
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            throw new PDOException("Database connection error. Please try again later.");
        }
    }
}

// Alias function for convenience
function getDatabaseConnection()
{
    return DatabaseConfig::getDatabaseConnection();
}
