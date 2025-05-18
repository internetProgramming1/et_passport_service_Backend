<?php
require_once __DIR__ . '/../Models/Application.php';

class DashboardController
{
    private $model;

    public function __construct()
    {
        $this->model = new Application();
    }

    public function index()
    {
        // Check authentication
        session_start();
        if (empty($_SESSION['admin_id'])) {
            header("Location: /admin/login");
            exit;
        }

        // Validate and sanitize input
        $category = $this->validateCategory($_GET['category'] ?? null);
        $tablename = $this->getTableName($category);

        // Get applications data
        $applications = [];
        if ($tablename) {
            try {
                $applications = $this->model->getApplications($category, $tablename);
            } catch (PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                $error = "Failed to load applications. Please try again.";
            }
        }

        // Display view
        include __DIR__ . '/../Views/dashboard_admin.php';
    }

    private function validateCategory($category)
    {
        $validCategories = ['new', 'renewal', 'lost', 'correction'];
        return in_array($category, $validCategories) ? $category : null;
    }

    private function getTableName($category)
    {
        if (!$category) return null;

        return $category . '_application';
    }
}
