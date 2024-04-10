<?php
namespace App\Models;
use PDO;
use App\Config\Database;

class ServicesModel
{
    private $conn;
    private $table = 'services';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getAllServices()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createService($data)
    {
        if (!isset($data['name']) || $data['name'] === null) {
            throw new \Exception("name ne peut pas être null");
        }

        $query = 'INSERT INTO ' . $this->table . ' (name, description, price) VALUES (:name, :description, :price)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function getService($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateService($id, $data)
    {
        $query = 'UPDATE services SET name = :name, description = :description, price = :price WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->execute();
    }

    public function deleteService($id)
    {
        $query = 'DELETE FROM services WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}