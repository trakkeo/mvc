<?php

namespace App\Controllers;

class EmailController
{
    public function sendEmail($name, $email, $message)
    {
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
            echo 'L\'e-mail a été envoyé avec succès.';
        } else {
            echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.';
        }

        // insérer la vue contact.php
        require '../app/Views/contact.php';
    }
}