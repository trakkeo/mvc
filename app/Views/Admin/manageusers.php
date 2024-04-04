<?php

namespace App\Views\Admin\manageusers;
use App\Models\UserModel;


?>
<!DOCTYPE html>
<html>

<head>
    <title>Gestion des utilisateurs</title>
</head>

<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <h1>Gestion des utilisateurs</h1>
        <p>Consultation, création et modification des comptes utilisateurs</p>

        <?php
        // Get the users from the database
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        // if the user is logged in display all users in a table
        if (isset($_SESSION['LOGGED_USER'])) {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Id</th>';
            echo '<th scope="col">Firstname</th>';
            echo '<th scope="col">Lastname</th>';
            echo '<th scope="col">Email</th>';
            echo '<th scope="col">Phone</th>';
            echo '<th scope="col">Role</th>';
            echo '<th scope="col">Actions</th>'; // Add a new column for the action buttons
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user['id'] . '</td>';
                echo '<td>' . $user['firstName'] . '</td>';
                echo '<td>' . $user['lastName'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '<td>' . $user['phone'] . '</td>';
                echo '<td>' . $user['role'] . '</td>';
                echo '<td>';
                echo '<a href="/update_myaccount?email=' . urlencode($user['email']) . '" class="btn btn-primary">Modifier</a>'; // Add the "Modifier" button
                echo ' ';
                echo '<button class="btn btn-danger">Supprimer</button>'; // Add the "Supprimer" button
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>Vous devez être connecté pour voir cette liste</p>';
        }


        ?>

    </div>
    <div>
        <footer class="footer">
            <?php
            // insérer le footer 
            require_once '../app/Views/footer.php';
            ?>
        </footer>
    </div>
</body>

</html>