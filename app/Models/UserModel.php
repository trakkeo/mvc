<?php 
namespace App\Models;
use PDO;
use App\Config\Database;

class UserModel
{
    private $conn;
    private $table = 'users';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    // get all users
    public function getAllUsers() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    public function updateUser($id, $userData)
    {
        $query = 'UPDATE users SET firstName = :firstName, lastName = :lastName, email = :email, phone = :phone, role = :role WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id); 
        $stmt->bindParam(':firstName', $userData['firstName']);
        $stmt->bindParam(':lastName', $userData['lastName']);
        $stmt->bindParam(':email', $userData['email']);
        $stmt->bindParam(':phone', $userData['phone']);
        $stmt->bindParam(':role', $userData['role']);

        $stmt->execute();
    }

        // updateMyAccount
        public function updateMyAccount($id, $userData)
        {
            $query = 'UPDATE users SET firstName = :firstName, lastName = :lastName, email = :email, phone = :phone WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id); 
            $stmt->bindParam(':firstName', $userData['firstName']);
            $stmt->bindParam(':lastName', $userData['lastName']);
            $stmt->bindParam(':email', $userData['email']);
            $stmt->bindParam(':phone', $userData['phone']);
    
            $stmt->execute();
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

    // login user
    public function login($email, $password) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email AND password = :password';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email['value']);
        $stmt->bindParam(':password', $password['value']);
        $stmt->execute();
        return $stmt->fetch();
    }

    // looged user role is admin ?
public function isAdmin($email) {
    $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email AND role = :role';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindValue(':role', 'admin');
    $stmt->execute();
    return $stmt->fetch();
}

    // login form validation
    public function validateLoginForm($postData) {
        $postData = $_POST;
        $errors = [];
    
        if (isset($postData['email']) && isset($postData['password'])) {
            if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Il faut un email valide pour soumettre le formulaire.';
            }
            return $errors;
        } else {
            $errors['email'] = 'Veuillez remplir les champs email et mot de passe.';
            return $errors;
        }
    // check if email and password are known
    $user = $this->getUserByEmail($postData['email']);
    if (!$user) {
        $errors['email'] = 'Cet email n\'existe pas.';
    } else {
        if (!password_verify($postData['password'], $user['password'])) {
            $errors['password'] = 'Le mot de passe est incorrect.';
        }

    }
    return $errors;
    }

public function ChangePassword() {
    $postData = $_POST;
    $errors = [];

    if (isset($postData['current_password']) && isset($postData['new_password']) && isset($postData['confirm_password'])) {
        if ($postData['new_password'] !== $postData['confirm_password']) {
            $errors['confirm_password'] = 'Les mots de passe ne correspondent pas.';
            return $errors;
        }

        // check if current password is correct
        $user = $this->getUserByEmail($_SESSION['email']);
        if (!password_verify($postData['current_password'], $user['password'])) {
            $errors['current_password'] = 'Le mot de passe actuel est incorrect.';
            return $errors;
        }

        // update password
        $newPassword = password_hash($postData['new_password'], PASSWORD_DEFAULT);
        $query = 'UPDATE users SET password = :password WHERE email = :email';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':email', $_SESSION['email']);
        $stmt->execute();

        // success message
        $_SESSION['CHANGE_PASSWORD_SUCCESS_MESSAGE'] = 'Mot de passe changé avec succès.';
        header('Location: /myaccount');
        exit;
    } else {
        $errors['current_password'] = 'Veuillez remplir les champs.';
        return $errors;
    }
}

}

?>
