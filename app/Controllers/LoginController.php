<?php
namespace App\Controllers;

use App\Models\LoginModel;

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
        
        if ($loginModel->authenticate($email, $password)) {
            // Start session
            session_start();
            //logg user in
            $_SESSION['LOGGED_USER'] = [
                'email' => $email,
            ];
            // Set session variables
            $_SESSION['email'] = $email;
            // Redirect to home page
            header('Location: /');
            exit;
            } else {
                
                header('Location: /login');
                $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                    'Les informations envoyées ne permettent pas de vous identifier. Veuillez réessayer.'
                );
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
