<?php
namespace Admin\Controllers;

class CustomerDashboardController
{
    public function index()
    {
        include __DIR__ . '/../../../../views/dashboard_customer.php';
    }
}
