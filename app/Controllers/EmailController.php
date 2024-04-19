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

        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );

        // Vérification des données
        if (empty($name) || empty($email) || empty($message)) {
            echo 'Veuillez remplir tous les champs.';
            return;
        }


        // Configuration des informations d'envoi d'e-mail
        $to = 'adrien@adrienbillard.com';
        $subject = 'Nouveau message de contact';
        $headers = "From: $name <$email>" . "\r\n";



        // Construction du corps du message
        $body = "Nom: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message: $message\n";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $message = '<html>
        <head>
            <title>Nouveau message du formulaire de contact</title>
        </head>
        <body>
            <h1>Nouveau message de ' . $name . '</h1><br><br>
            <h3 style="color: #1abc9c;">Email : ' . $email . '</h3>
            <p><strong>Message:</strong> ' . $message . '</p>
        </body>
        </html>';

        // Envoi de l'e-mail
        if (mail($to, $subject, $message, $headers)) {
            header('Location: /contact');
        } else {
            echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.';
        }
    }
}
