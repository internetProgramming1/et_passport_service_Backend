<?php
require_once __DIR__ . '/../Models/Application.php';

class DashboardController
{
    private $model;

    public function __construct()
    {
        $this->model = new ApplicationModel();
    }

    public function index()
    {
        // Get status counts for all tables
        $statusCounts = $this->model->getStatusCounts();

        // List of application tables
        $tables = [
            'renewal_application',
            'urgent_renewal_application',
            'new_application',
            'urgent_new_application',
            'lost_application',
            'urgent_lost_application',
            'correction_application',
            'urgent_correction_application'
        ];

        // Get applications for each table
        $applications = [];
        foreach ($tables as $table) {
            $applications[$table] = $this->model->getApplications($table, null, 5);
        }

        // Load the view
        require __DIR__ . '/../Views/dashboard_admin.php';
    }
}
