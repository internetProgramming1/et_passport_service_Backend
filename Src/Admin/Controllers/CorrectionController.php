<?php
require_once __DIR__ . '/../Models/CorrectionApplicationModel.php';

class CorrectionController
{
    private $model;

    public function __construct()
    {
        $this->model = new CorrectionApplicationModel();
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

            // Regular page load - get both urgent and normal applications
            $urgentApps = $this->model->getUrgentData();
            $normalApps = $this->model->getNormalData();



            // echo "<pre>";
            // print_r($urgentApps);
            // echo "</pre>";

            // Include view file - variables will be available in the view
            include __DIR__ . '/../Views/correction_applications.php';
        } catch (Exception $e) {
            error_log("Error fetching applications: " . $e->getMessage());
            echo "<p style='color:red;'>There was an error loading applications. Please try again.</p>";
            echo "<p>" . $e->getMessage() . "</p>";
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

    // In your controller
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
