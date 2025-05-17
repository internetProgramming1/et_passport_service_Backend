<?php
namespace Admin\Controllers;

use Admin\Models\Application;
use Admin\Models\Status;

class ApplicationStatusController
{
    public function view($applicationId)
    {
        session_start();
        if (empty($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }
        $application = Application::getById($applicationId);
        $statuses = Status::getStatusesByApplicationId($applicationId);
        include __DIR__ . '/../Views/view_application.php';
    }
}
