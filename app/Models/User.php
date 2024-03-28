<?php 
namespace App\Models;
class User
{
  
    private $conn;
    private $table = 'users';



    // get all users
    public function getAllUsers() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // create user
    public function createUser($data) {
        $query = 'INSERT INTO ' . $this->table . ' (firstName, lastName, email, password, phone, role) VALUES (:firstName, :lastName, :email, :password, :phone, :role)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':firstName', $data['firstName']);
        $stmt->bindParam(':lastName', $data['lastName']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    // update user
    public function updateUser($data) {
        $query = 'UPDATE ' . $this->table . ' SET firstName = :firstName, lastName = :lastName, email = :email, password = :password, phone = :phone, role = :role WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':firstName', $data['firstName']);
        $stmt->bindParam(':lastName', $data['lastName']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->execute();
        return $stmt->rowCount();
    }

    // delete user
    public function deleteUser($id) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    // get user by id
    public function getUserById($id) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    // get user by email
    public function getUserByEmail($email) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }


}
?>
