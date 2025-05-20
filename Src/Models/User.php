<?php
class User {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }
    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    public function create($firstName, $fatherName, $grandfatherName, $email, $hashedPassword) {
        $stmt = $this->pdo->prepare("INSERT INTO users (firstname, fathername, grandfathername, email, password) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$firstName, $fatherName, $grandfatherName, $email, $hashedPassword]);
    }
}