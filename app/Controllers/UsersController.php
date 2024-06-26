<?php

namespace App\Controllers;

use App\Models\UserModel;

//session_start();

class UsersController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function createUser()
    {
        // Traitement de la requête POST pour créer un nouvel utilisateur
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Assurer la validation et l'assainissement des données ici
            $userData = [
                'firstName' => $_POST['firstName'] ?? '',
                'lastName' => $_POST['lastName'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'role' => $_POST['role'] ?? '',
            ];

            // vérifier si l'utilisateur existe déjà dans la base de données avec le même email
            $user = $this->userModel->getUserByEmail($userData['email']);
            if ($user) {
                echo '<p class="alert alert-danger">Cet utilisateur existe déjà</p>';
                exit;
            }


            $this->userModel->createUser($userData);
            // Rediriger vers /manage_users si la création est réussie
            header('Location: /manage_users');
            exit;
        }
        // Afficher le formulaire de création d'un nouvel utilisateur
        require '../app/Views/Admin/createuser.php';
    }

    public function register()
    {
        // Traitement de la requête POST pour créer un nouvel utilisateur
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Assurer la validation et l'assainissement des données ici
            $userData = [
                'firstName' => $_POST['firstName'] ?? '',
                'lastName' => $_POST['lastName'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'role' => 'patient',
            ];

            // vérifier si l'utilisateur existe déjà dans la base de données avec le même email
            $user = $this->userModel->getUserByEmail($userData['email']);
            if ($user) {
                echo '<p class="alert alert-danger">Cet utilisateur existe déjà</p>';
                exit;
            }


            $this->userModel->createUser($userData);
            $_SESSION['registration_success'] = 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.';
            // Rediriger vers /manage_users si la création est réussie
            header('Location: /login');
            exit;
        }
        // Afficher le formulaire de création d'un nouvel utilisateur
        require '../app/Views/Users/register.php';
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
            require '../app/Views/Admin/manageusers.php';
        } else {
            // if user is not admin display error message
            echo '<p>Vous n\'êtes pas autorisé à voir cette page</p>';
        }
    }

    public function index()
    {

        // Créer une instance du modèle de l'utilisateur
        $userModel = new UserModel();
        // Récupérer les informations de l'utilisateur à partir de la session
        $user = $userModel->getUserByEmail($_SESSION['email']);
        include '../app/Views/Users/myaccount.php';
    }

    public function indexAdmin()
    {
        include '../app/Views/Admin/index.php';
    }


    public function updateMyAccount()
    {
        // Créer une instance du modèle de l'utilisateur
        $userModel = new UserModel();
        // Récupérer les informations de l'utilisateur à partir de la session
        $user = $userModel->getUserByEmail($_SESSION['email']);

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

        // Code pour mettre à jour le compte utilisateur
        include '../app/Views/Users/updatemyaccount.php';
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
            include '../app/Views/Users/changepassword.php';
        }
    }
    public function deleteAccountAdmin()
    {
        // Code pour supprimer le compte utilisateur
        include '../app/Views/Admin/manageusers.php';
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
            echo 'Utilisateur non trouvé';
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
                'password' => $_POST['password'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'role' => $_POST['role'] ?? '',
            ];


            $this->userModel->updateUser($user['id'], $userData);

            // Rediriger vers /manage_users si la mise à jour est réussie
            header('Location: /manage_users');
            exit;
        }

        // Inclure la vue pour mettre à jour les données de l'utilisateur
        include '../app/Views/Admin/updateuseraccount.php';
    }

    public function adminOnly()
    {
        // Afficher la page réservée aux administrateurs
        require '../app/Views/Admin/adminonly.php';
    }
}
