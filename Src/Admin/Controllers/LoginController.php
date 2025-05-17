<?php
namespace Admin\Controllers;

use Admin\Models\Admin;

class LoginController
{
    public function showLoginForm()
    {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Check if already logged in
        if (isset($_SESSION['admin_id'])) {
            header('Location: /admin/dashboard');
            exit;
        }

        include __DIR__ . '/../../Views/auth/login.php';
    }

    public function login()
    {
        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $admin = Admin::authenticate($username, $password);

            if ($admin) {
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_type'] = $admin['type'];
                $_SESSION['admin_username'] = $admin['username'];

                header('Location: /admin/dashboard');
                exit;
            } else {
                $error = "Invalid credentials";
                include __DIR__ . '/../../Views/auth/login.php';
            }
        }
    }

    public function logout()
    {
        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Unset all session variables
        $_SESSION = array();
        
        // Destroy the session
        session_destroy();
        
        // Redirect to login page
        header('Location: /admin/login');
        exit;
    }
}