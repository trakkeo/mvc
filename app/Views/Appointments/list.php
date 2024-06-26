<?php

namespace App\Views\Appointments;

use App\Models\UserModel;
use App\Models\ServicesModel;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <title>Liste des rendez-vous</title>
    </head>

<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <h1>Liste des rendez-vous</h1>
        <p>Consultation et gestion des rendez-vous</p>

        <a href="/create_appointment" class="btn btn-primary mb-2" style="margin-right: 5px;">Créer un nouveau rendez-vous</a>

        <?php
        if (isset($_SESSION['LOGGED_USER'])) :
            $userModel = new UserModel();
            $isAdmin = $userModel->isAdmin($_SESSION['LOGGED_USER']['email']);
            if ($isAdmin) {
                // display message if user is an admin
                echo '<p>Vous êtes connecté en tant qu\'administrateur</p>';
                // display the list of appointments in a bootstrap table
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">Id</th>';
                echo '<th scope="col">Date et Heure</th>';
                echo '<th scope="col">Notes</th>';
                echo '<th scope="col">Service</th>';
                echo '<th scope="col">Utilisateur</th>';
                echo '<th scope="col">Status</th>';
                echo '<th scope="col">Actions</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($appointments as $appointment) {
                    echo '<tr>';
                    echo '<td>' . $appointment['id'] . '</td>';
                    echo '<td>' . $appointment['bookingAt'] . '</td>';
                    echo '<td>' . $appointment['notes'] . '</td>';
                    // how to display the service name instead of the id?
                    $serviceModel = new ServicesModel();
                    $service = $serviceModel->getService($appointment['serviceId']);
                    echo '<td>' . $service['name'] . '</td>';
                    //display user firstNam and lastName instead of the userId
                    $user = $userModel->getUserById($appointment['userId']);
                    echo '<td>' . $user['firstName'] . ' ' . $user['lastName'] . '</td>';
                    echo '<td>' . $appointment['status'] . '</td>';
                    echo '<td>';
                    echo '<a href="/update_appointment?id=' . $appointment['id'] . '" class="btn btn-primary mb-2" style="margin-right: 5px;">Modifier</a>';
                    echo '<a href="/delete_appointment?id=' . $appointment['id'] . '" class="btn btn-danger mb-2" style="margin-right: 5px;" onclick="return confirm(\'Etes vous sûr de vouloir supprimer ce rendez-vous ?\');">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                // display message if user is not an admin
                echo '<p>Vous n\'êtes pas autorisé à voir cette liste</p>';
            }
        endif;
        ?>
        </tbody>
        </table>
    </div>
    </div>
</body>
<footer class="footer">
    <?php include '../app/Views/footer.php'; ?>
</footer>