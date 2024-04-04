<?php
namespace App\Models;

use PDO;
use App\Config\Database;


class LoginModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function authenticate($email, $password)
    {
            $query = 'SELECT password FROM users WHERE email = :email';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Set session or any other login logic here
            $_SESSION['user_email'] = $email;
            return true;
        }

        return false;
    }
}
