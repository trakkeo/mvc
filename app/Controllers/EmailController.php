<?php

namespace App\Controllers;

class EmailController
{
    public function index()
    {
        require_once __DIR__ . '/../Views/contact.php';
    }

    public function sendEmail($name, $email, $message)
    {

        // Vérification des données
        if (empty($name) || empty($email) || empty($message)) {
            echo 'Veuillez remplir tous les champs.';
            return;
        }


        // Configuration des informations d'envoi d'e-mail
        $to = 'adrienbillard@trakkeo.com';
        $subject = 'Nouveau message de contact';
        $headers = "From: $name <$email>" . "\r\n";



        // Construction du corps du message
        $body = "Nom: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message: $message\n";



        // Envoi de l'e-mail
        if (mail($to, $subject, $body, $headers)) {
            var_dump($name, $email, $message);
            header('Location: /contact');
        } else {
            echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.';
        }
    }
}
