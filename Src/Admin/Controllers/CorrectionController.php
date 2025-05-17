<?php
namespace Admin\Controllers;

use Admin\Models\Application;

class CorrectionController
{
    public function index()
    {
        session_start();
        if (empty($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }
        $applications = Application::getCorrectionApplications();
        include __DIR__ . '/../Views/correction_applications.php';
    }
}
