<?php

require_once __DIR__ . '/../Models/RenewalApplicationModel.php';

class RenewalApplicationController
{
    private $model;

    public function __construct()
    {
        $this->model = new RenewalApplicationModel();
    }

    public function index()
    {

        try {
            // Get applications from both tables
            $model = new RenewalApplicationModel();
            $urgentApps = $model->getUrgentData();
            $normalApps = $model->getNormalData();
            // Display the view
            echo "<pre>";
            foreach ($urgentApps as $key => $appn) {
                echo "<br>" . $key . "=>" . $appn;
            }
            echo "</pre>";
            include __DIR__ . '/../Views/lost_applications.php';
        } catch (Exception $e) {
            error_log("Error fetching applications: " . $e->getMessage());
            $error = "Failed to load applications. Please try again.";
            echo " Their is error";
        }
    }
}
