<?php

namespace Admin\Controllers;

class DashboardController
{
    public function index()
    {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if admin is logged in
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        // Get admin details from session
        $adminName = $_SESSION['admin_username'] ?? 'Unknown';
        $adminType = $_SESSION['admin_type'] ?? 'Unknown';

        // Load dashboard view
        include __DIR__ . '/../Views/dashboard.php';
    }
}
