<?php
namespace Admin\Controllers;

use Admin\Models\Application;

class LostApplicationController
{
    public function index()
    {
        session_start();
        if (empty($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }
        $applications = Application::getLostApplications();
        include __DIR__ . '/../Views/lost_applications.php';
    }
}
