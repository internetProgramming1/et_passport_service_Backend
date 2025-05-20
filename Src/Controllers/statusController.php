<?php
require_once __DIR__ . '/../Models/statusModel.php';
class StatusController
{
    private $model;

    public function __construct()
    {
        $this->model = new statusModel();
    }

    public function showForm()
    {
        require_once __DIR__ . '/../Views/Track/check_form.php';
    }

    public function checkStatus()
    {
        $appNo = $_POST['application_no'] ?? '';
        if ($appNo) {
            $model = new StatusModel();
            $result = $model->findStatus($appNo);
            require __DIR__ . '/../Views/Track/result.php';
        }
    }
}
