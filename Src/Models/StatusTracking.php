<?php
namespace Models;

class StatusTracking
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = \DatabaseConfig::getDatabaseConnection();
    }

    public function getStatusByAppointmentId($appointmentId)
    {
        $sql = "SELECT status, updated_at, remarks FROM application_status WHERE appointment_id = :appointmentId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['appointmentId' => $appointmentId]);
        return $stmt->fetch();
    }
}
