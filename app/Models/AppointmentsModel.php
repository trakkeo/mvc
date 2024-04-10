<?php

namespace App\Models;

use PDO;
use App\Config\Database;

class AppointmentsModel
{
    private $conn;
    private $table = 'appointments';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function createAppointment($data)
    {
        // Vérifiez si 'userId' est présent et n'est pas null
        if (!isset($data['userId']) || $data['userId'] === null) {
            throw new \Exception("userId ne peut pas être null");
        }

        $query = 'INSERT INTO ' . $this->table . ' (bookingAt, notes, serviceId, userId) VALUES (:bookingAt, :notes, :serviceId, :userId)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':bookingAt', $data['bookingAt']);
        $stmt->bindParam(':notes', $data['notes']);
        $stmt->bindParam(':serviceId', $data['serviceId']);
        $stmt->bindParam(':userId', $data['userId']);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function getAppointment($id)
    {
        // Logique pour récupérer un enregistrement spécifique de la table "appointments" en fonction de l'ID
        // Retournez les données de l'enregistrement trouvé
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAppointments()
    {
        // Logique pour récupérer tous les enregistrements de la table "appointments"
        // Retournez les données de tous les enregistrements trouvés
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateAppointment($id, $data)
    {
        // Logique pour mettre à jour un enregistrement spécifique dans la table "appointments" en fonction de l'ID
        // Utilisez les valeurs de $data pour mettre à jour les colonnes appropriées dans la table
    }

    public function deleteAppointment($id)
    {
        // Logique pour supprimer un enregistrement spécifique de la table "appointments" en fonction de l'ID
    }
}
