<?php
namespace Controllers;

use Models\StatusTracking;

class StatusTrackingController
{
    public function showForm()
    {
        include __DIR__ . '/../Views/Appointment/track_status/form.php';
    }

    public function checkStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $appointmentId = $_POST['appointment_id'] ?? '';

            if (empty($appointmentId)) {
                $error = "Appointment ID is required.";
                include __DIR__ . '/../Views/Appointment/track_status/form.php';
                return;
            }

            $model = new StatusTracking();
            $statusData = $model->getStatusByAppointmentId($appointmentId);

            if ($statusData) {
                include __DIR__ . '/../Views/Appointment/track_status/result.php';
            } else {
                $error = "No status found for the provided appointment ID.";
                include __DIR__ . '/../Views/Appointment/track_status/form.php';
            }
        } else {
            http_response_code(405);
            echo "Method Not Allowed";
        }
    }
}
