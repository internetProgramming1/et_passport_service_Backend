<?php

namespace Admin\Controllers;

use Admin\Models\Admin;

class LoginController
{
    public function showLoginForm()
    {
        // Check if already logged in
        if (!empty($_SESSION['admin_id'])) {
            $this->redirect('/admin/dashboard');
        }

        include __DIR__ . '/../Views/auth/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/login');
        }

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $admin = Admin::authenticate($username, $password);

        if ($admin) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_type'] = $admin['type'];
            $this->redirect('/admin/dashboard');
        } else {
            $error = "Invalid username or password";
            include __DIR__ . '/../../Views/auth/login.php';
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/admin/login');
    }

    private function redirect($path)
    {
        $base = '/project/et_passport_service_Backend/Public';
        header("Location: $base$path");
        exit;
    }
}
