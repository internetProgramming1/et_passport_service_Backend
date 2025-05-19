<?php

require_once __DIR__ . '/../Models/LostApplicationModel.php';

class LostApplicationController
{
    private $model;

    public function __construct()
    {
        $this->model = new LostApplicationModel();
    }

    public function index()
    {

        try {

            // Check if this is a search request
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['app_no'])) {
                return $this->searchApplication();
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_status') {
                $this->updateStatusAction();
                exit();
            }
            // Get applications from both tables
            $urgentApps = $this->model->getUrgentData();
            $normalApps = $this->model->getNormalData();

            include __DIR__ . '/../Views/lost_applications.php';
        } catch (Exception $e) {
            error_log("Error fetching applications: " . $e->getMessage());
            $error = "Failed to load applications. Please try again.";
            echo " Their is error";
        }
    }
    private function searchApplication()
    {
        $appNo = $_POST['app_no'] ?? null;

        if ($appNo) {
            $application = $this->model->getApplicationNo($appNo);

            // Get regular data for the view (you might want to adjust this)
            $urgentApps = $this->model->getUrgentData();
            $normalApps = $this->model->getNormalData();

            // Pass all data to the view
            include __DIR__ . '/../Views/new_application.php';
        } else {
            // If empty search, redirect back to index
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    }
    public function updateStatusAction()
    {
        header('Content-Type: application/json');
        $id = $_POST['id'] ?? null;
        $status = $_POST['status'] ?? null;

        try {
            $this->model->updateStatus($id, $status);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
