<?php
namespace App\Controllers;
use App\Models\LoginModel;

//session_start();

class LoginController
{
    public function login()
    {
        include '../app/Views/login.php';
    }

    public function submit_login()
    {
        $loginModel = new LoginModel();
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        //session_start();
        if ($loginModel->authenticate($email, $password)) {

            //logg user in
            $_SESSION['LOGGED_USER'] = [
                'email' => $email,
            ];
            // Set session variables
            $_SESSION['email'] = $email;
            // Redirect to home page
            // afficher un message de succès
            $_SESSION['LOGIN_SUCCESS_MESSAGE'] = 'Vous êtes maintenant connecté.';
            header('Location: /');
            exit;
            } else {
          
                $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Les informations envoyées ne permettent pas de vous identifier. Veuillez réessayer.';
                header('Location: /login');
                exit;
                    
            }

        }

    public function logout()
    {
        // Start session
        session_start();
        // Unset all session variables
        $_SESSION = [];
        // Destroy session
        session_destroy();
        // Redirect to home page
        header('Location: /');
    }
}
