<?php
namespace Admin\Controllers;

class CustomerDashboardController {
    public function index() {
        include __DIR__ . '/../Views/customer_dashboard.php';
    }
}
