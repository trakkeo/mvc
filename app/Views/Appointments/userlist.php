<?php

namespace App\Views\Appointments;

use App\Models\UserModel;
use App\Models\ServicesModel;

$serviceModel = new ServicesModel();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <title>Mes rendez-vous</title>
    </head>

<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <h1>Liste de mes rendez-vous</h1>


        <a href="/create_appointment" class="btn btn-primary mb-2" style="margin-right: 5px;">Créer un nouveau rendez-vous</a>

        <?php
                // display the list of appointments in a bootstrap table
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">Date et Heure</th>';
                echo '<th scope="col">Notes</th>';
                echo '<th scope="col">Service</th>';
                echo '<th scope="col">Utilisateur</th>';
                echo '<th scope="col">Status</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($appointments as $appointment) {
                    // get logged user id
                    $userModel = new UserModel();
                    $user = $userModel->getUserByEmail($_SESSION['LOGGED_USER']['email']);
                    if ($user['id'] == $appointment['userId']) {
                    echo '<tr>';
                    echo '<td>' . $appointment['bookingAt'] . '</td>';
                    echo '<td>' . $appointment['notes'] . '</td>';
                    // how to display the service name instead of the id?
                    $service = $serviceModel->getService($appointment['serviceId']);
                    if (is_array($service)) {
                        echo '<td>' . $service['name'] . '</td>';
                    } else {
                        echo '<td>Service non trouvé</td>';
                    }
                    //display user firstNam and lastName instead of the userId
                    $user = $userModel->getUserById($appointment['userId']);
                    if (is_array($user)) {
                        echo '<td>' . $user['firstName'] . ' ' . $user['lastName'] . '</td>';
                    } else {
                        echo '<td>Utilisateur non trouvé</td>';
                    }
                    echo '<td>' . $appointment['status'] . '</td>';
                    echo '</tr>';
                }
            }
        ?>
        </tbody>
        </table>
    </div>
    </div>
</body>
<footer class="footer">
    <?php include '../app/Views/footer.php'; ?>
</footer>