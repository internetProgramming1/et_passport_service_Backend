<?php
require_once __DIR__ . '/../Models/NewApplicationModel.php';

class NewApplicationController
{
    private $model;

    public function __construct()
    {
        $this->model = new NewApplicationModel();
    }

    public function index()
    {

        try {
            // Get applications from both tables
            $model = new NewApplicationModel();
            $urgentApps = $model->getUrgentData();
            $normalApps = $model->getNormalData();
            // Display the view
            echo "<pre>";
            foreach ($urgentApps as $key => $appn) {
                echo "<br>" . $key . "=>" . $appn;
            }
            echo "</pre>";
            include __DIR__ . '/../Views/new_application.php';
        } catch (Exception $e) {
            error_log("Error fetching applications: " . $e->getMessage());
            $error = "Failed to load applications. Please try again.";
            echo " Their is error";
        }
    }
}
