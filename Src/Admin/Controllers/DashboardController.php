<?php
namespace Admin\Controllers;

class DashboardController
{
    public function index()
    {
        session_start();

        if (empty($_SESSION['user_type'])) {
            // Redirect to login if no user type is set
            header('Location: /admin/login');
            exit;
        }

        if ($_SESSION['user_type'] === 'admin') {
            include __DIR__ . '/../Views/dashboard_admin.php';
        } elseif ($_SESSION['user_type'] === 'customer') {
            include __DIR__ . '/../Views/dashboard_customer.php';
        } else {
            // Unknown user type: show error or redirect
            http_response_code(403);
            echo 'Access Denied';
            exit;
        }
    }
}
