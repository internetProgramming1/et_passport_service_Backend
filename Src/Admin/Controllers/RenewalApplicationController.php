<?php
namespace Admin\Controllers;

use Admin\Models\Application;

class RenewalApplicationController
{
    public function index()
    {
        session_start();
        if (empty($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }
        $applications = Application::getRenewalApplications();
        include __DIR__ . '/../Views/renewal_applications.php';
    }
}
