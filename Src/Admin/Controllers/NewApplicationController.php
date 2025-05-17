<?php
namespace Admin\Controllers;

use Admin\Models\Application;

class NewApplicationController
{
    public function index()
    {
        session_start();
        if (empty($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }
        $applications = Application::getNewApplications();
        include __DIR__ . '/../Views/new_applications.php';
    }
}
