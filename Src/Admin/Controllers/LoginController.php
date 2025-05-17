<?php
namespace Admin\Controllers;

use PDO;

class LoginController
{
    public function showLoginForm()
    {
        $error = $_SESSION['error'] ?? '';
        unset($_SESSION['error']);
        include __DIR__ . '/../../../../views/login.php';
    }

    public function login()
    {
        session_start();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $loginAs = $_POST['login_as'] ?? '';

        if (!$username || !$password || !$loginAs) {
            $_SESSION['error'] = "Please fill all fields.";
            header('Location: /admin/login');
            exit;
        }

        // Connect to DB (use your DatabaseConfig class or PDO directly)
        $pdo = \DatabaseConfig::getDatabaseConnection();

        if ($loginAs === 'admin') {
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['admin_id'] = $user['admin_id'];
                $_SESSION['admin_username'] = $user['username'];
                header('Location: /admin/dashboard');
                exit;
            } else {
                $_SESSION['error'] = "Invalid admin username or password.";
                header('Location: /admin/login');
                exit;
            }

        } elseif ($loginAs === 'customer') {
            $stmt = $pdo->prepare("SELECT * FROM customers WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['customer_id'] = $user['id'];
                $_SESSION['customer_username'] = $user['username'];
                header('Location: /customer/dashboard');
                exit;
            } else {
                $_SESSION['error'] = "Invalid customer username or password.";
                header('Location: /admin/login');
                exit;
            }

        } else {
            $_SESSION['error'] = "Invalid login type selected.";
            header('Location: /admin/login');
            exit;
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /admin/login');
        exit;
    }
}
