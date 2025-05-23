<?php

namespace Admin\Controllers;

require_once __DIR__ . '/../Models/Admin.php';


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

        // $admin = Admin::authenticate($username, $password);

        $adminModel = new \Admin\Models\Admin();
        $admin =  $adminModel->findByUsername($username);
        if ($admin) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_type'] = $admin['type'];

            $this->redirect('/admin/dashboard');
        } else {
            $error = "Invalid username or password";
            include __DIR__ . '/../Views/auth/login.php';
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/admin/login');
    }

    private function redirect($path)
    {
        header("Location: $path");
        exit;
    }
}
