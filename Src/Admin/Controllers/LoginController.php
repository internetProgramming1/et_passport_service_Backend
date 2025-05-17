<?php
namespace Admin\Controllers;

use PDO;

class LoginController
{
    private $pdo;

    public function __construct()
    {
        // Get PDO instance from your DatabaseConfig helper or create here
        $this->pdo = \getDatabaseConnection();
    }

    public function showLoginForm($error = null)
    {
        // Pass $error if any
        include __DIR__ . '/../Views/auth/login.php';
    }

    public function login()
    {
        session_start();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $loginAs = $_POST['login_as'] ?? '';

        if (!$username || !$password || !$loginAs) {
            $this->showLoginForm('All fields are required.');
            return;
        }

        if ($loginAs === 'admin') {
            $table = 'admins';  // Replace with your actual admin table name
        } elseif ($loginAs === 'customer') {
            $table = 'customers';  // Replace with your actual customer table name
        } else {
            $this->showLoginForm('Invalid login type selected.');
            return;
        }

        // Prepare query
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Password matches
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_type'] = $loginAs;

            if ($loginAs === 'admin') {
                $_SESSION['admin_id'] = $user['id'];
                header('Location: /admin/dashboard');
            } else {
                $_SESSION['customer_id'] = $user['id'];
                header('Location: /customer/dashboard'); // Adjust route accordingly
            }
            exit;
        } else {
            $this->showLoginForm('Invalid username or password.');
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: /admin/login');
        exit;
    }
}
