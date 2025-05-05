<?php
$host = "localhost";
$db = "Project_et_passport_db";
$user = "root";     
$password = " ";         

$dsn = "mysql:host=$host;dbname=$db;charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Db Connection Failed: " . $e->getMessage());
}
?>
