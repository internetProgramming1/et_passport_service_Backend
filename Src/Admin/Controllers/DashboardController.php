<?php
namespace Admin\Controllers;

class DashboardController
{
    public function index()
    {
        include __DIR__ . '/../../../../views/dashboard_admin.php';
    }
}
