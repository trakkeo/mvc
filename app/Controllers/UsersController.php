<?php

namespace App\Controllers;

use App\Models\UserModel;

session_start();

class UsersController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getAllUsers()
    {

        //call function manageUsers from usermodel
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        // call funstion isAdmin from usermodel
        $isAdmin = $userModel->isAdmin($_SESSION['email']);
        // if user is admin display manageusers.php
        if ($isAdmin) {
            require '../app/views/admin/manageusers.php';
        } else {
            // if user is not admin display error message
            echo '<p>Vous n\'êtes pas autorisé à voir cette liste</p>';
        }
    }

    public function index()
    {
        include '../app/views/Users/myaccount.php';
        // Créer une instance du modèle de l'utilisateur
        $userModel = new UserModel();
        // Récupérer les informations de l'utilisateur à partir de la session
        $user = $userModel->getUserByEmail($_SESSION['email']);
    }

    public function updateMyAccount()
    {
        // Créer une instance du modèle de l'utilisateur
        $userModel = new UserModel();
        // Récupérer les informations de l'utilisateur à partir de la session
        $user = $userModel->getUserByEmail($_SESSION['email']);
        // Code pour mettre à jour le compte utilisateur
        include '../app/views/Users/updatemyaccount.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Afficher le formulaire de mise à jour du compte utilisateur
            $userData = [
                'firstName' => $_POST['firstName'] ?? '',
                'lastName' => $_POST['lastName'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
            ];

            $this->userModel->updateMyAccount($user['id'], $userData);
            // Rediriger vers /myaccount
            header('Location: /myaccount');
            exit;
        }
    }


    public function changePassword()
    {
        // Créer une instance du modèle de l'utilisateur
        $userModel = new UserModel();

        // Code pour changer le mot de passe de l'utilisateur
        $errors = $userModel->changePassword();

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<p class="alert alert-danger">' . $error . '</p>';
            }
            include '../app/views/Users/changepassword.php';
        }
    }
    public function deleteAccountAdmin()
    {
        // Code pour supprimer le compte utilisateur
        include '../app/views/Admin/manageusers.php';
        // Supprimer le compte utilisateur
        $this->userModel->deleteUser($user['id']);
        // Rediriger vers la page de connexion
        header('Location: /manage_users');
        exit;
    }

    public function updateUser()
    {
        // Récupérer l'utilisateur à partir de l'URL
        if (isset($_GET['id'])) {
            $user = $this->userModel->getUserById($_GET['id']);
        } else {
            //afficher une erreur
            echo 'Utilisateur non trouvé sss';

        }
    
        // Traitement de la requête POST pour mettre à jour les données de l'utilisateur
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Assurer la validation et l'assainissement des données ici
            $user = $this->userModel->getUserById($_GET['id']);
            
            $userData = [
                'id' => $_POST['id'] ?? '',
                'firstName' => $_POST['firstName'] ?? '',
                'lastName' => $_POST['lastName'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'role' => $_POST['role'] ?? '',
            ];
    
            if ($this->userModel->updateMyAccount($user['id'], $userData)) {
                // Rediriger vers /manage_users si la mise à jour est réussie
                header('Location: /manage_users');
                exit;
            } else {
                // Gérer l'erreur de mise à jour ici
                echo 'Erreur lors de la mise à jour de l\'utilisateur';
            }
        }
    
        // Inclure la vue seulement si la requête n'est pas POST ou si la mise à jour échoue
        include '../app/views/Admin/updateuseraccount.php';
    }
    
}