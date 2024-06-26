<?php

namespace App\Views\Admin;

use App\Models\UserModel;



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
</head>

<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <h1>Administration</h1>

        <?php
        $userModel = new UserModel();
        $isAdmin = $userModel->isAdmin($_SESSION['LOGGED_USER']['email']);
        if ($isAdmin) {
            // display message if user is an admin
            echo '<p>Vous êtes connecté en tant qu\'administrateur</p><br>';
            // ajouter un div pour contenir les boutons
            echo '<div class="button-container">';
            // ajouter un bouton bootstrap pour gérer les services
            echo '<a href="/list_services" class="btn btn-primary mb-2" style="margin-right: 5px;">Gérer les services</a>';
            // ajouter un bouton bootstrap pour gérer les rendez-vous
            echo '<a href="/get_appointments" class="btn btn-primary mb-2" style="margin-right: 5px;">Gérer les rendez-vous</a>';
            // ajouter un bouton bootstrap pour gérer les utilisateurs
            echo '<a href="/manage_users" class="btn btn-primary mb-2" style="margin-right: 5px;">Gérer les utilisateurs</a>';
            // ajouter un bouton bootstrap pour gérer les actualités
            echo '<a href="/list_news" class="btn btn-primary mb-2" style="margin-right: 5px;">Gérer les actualités</a>';
            // ajouter un bouton bootstrap pour gérer les horaires d'ouverture
            echo '<a href="/update_shifts" class="btn btn-primary mb-2" style="margin-right: 5px;">Gérer les horaires d\'ouverture</a>';
            // fermer le div
            echo '</div>';
        } else {
            // redirection vers /adminonly si l'utilisateur n'est pas un administrateur
            header('Location: /adminonly');
            exit;
        }
        ?>


        </div>
        <footer class="footer">
            <?php
            // insérer le footer 
            require_once '../app/Views/footer.php';
            ?>
        </footer>

</body>

</html>