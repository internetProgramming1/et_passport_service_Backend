<?php
namespace Admin\Controllers;

use Admin\Models\Admin;

class LoginController
{
    public function showLoginForm()
    {
        include __DIR__ . '/../Views/auth/login.php';
    }

    public function login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $admin = Admin::authenticate($username, $password);

            if ($admin) {
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_type'] = $admin['type']; // new, renewal, etc.

                header('Location: /admin/dashboard');
                exit;
            } else {
                $error = "Invalid credentials";
                include __DIR__ . '/../Views/auth/login.php';
            }
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
