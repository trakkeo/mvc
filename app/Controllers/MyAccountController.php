<?php
namespace App\Controllers;
Use App\Models\UserModel;

class MyAccountController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {        
        // Code pour afficher la page d'accueil du compte utilisateur
        include '../app/views/myaccount.php';

        // Créer une instance du modèle de l'utilisateur
        $userModel = new UserModel();
        // Récupérer les informations de l'utilisateur à partir de la session
        $user = $userModel->getUserByEmail($_SESSION['email']);

    }

     public function updateMyAccount()
    {
        // Code pour mettre à jour le compte utilisateur
        include '../app/views/updatemyaccount.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Afficher le formulaire de mise à jour du compte utilisateur
            $userData = [
                'firstName' => $_POST['firstName'] ?? '',
                'lastName' => $_POST['lastName'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
            ];

            $this->userModel->updateUser($user['id'], $userData);
                // Rediriger vers /myaccount
                header('Location: /myaccount');
                exit;
            }
    }


    public function changePassword()
    {
        // Code pour changer le mot de passe de l'utilisateur
        include '../app/views/changepassword.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword !== $confirmPassword) {
                echo '<p class="alert alert-danger">Les mots de passe ne correspondent pas!</p>';
                $isValid = false;
            }

            if ($isValid) {
                // Mettre à jour le mot de passe dans la base de données
                $userModel->changePassword($user['id'], ['password' => $newPassword]);

                echo '<p class="alert alert-success">Mot de passe changé avec succès!</p>';
            
            } else {
                echo '<p class="alert alert-danger">Impossible de changer le mot de passe!</p>';
                header('Location: /change_password');
                exit;
            }
        }
    }

}