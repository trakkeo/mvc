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
    
        if (isset($_SESSION['LOGGED_USER'])): ?>

            <a href="/create_user" class="btn btn-primary mb-2" style="margin-right: 5px;">Créer un nouvel utilisateur</a>

            <?php
            $userModel = new UserModel();
            $isAdmin = $userModel->isAdmin($_SESSION['LOGGED_USER']['email']);
            if ($isAdmin) {
                // display message if user is an admin
                echo '<p>Vous êtes connecté en tant qu\'administrateur</p>';
            } else {
                // display message if user is not an admin
                echo '<p>Vous n\'êtes pas autorisé à voir cette liste</p>';
            }
            ?>

            <h2>Liste des utilisateurs</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th> <!-- Add a new column for the action buttons -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['firstName']) ?></td>
                            <td><?= htmlspecialchars($user['lastName']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['phone']) ?></td>
                            <td><?= htmlspecialchars($user['role']) ?></td>
                            <td>
                                <a href="/update_user_account?id=<?= urlencode($user['id']) ?>" class="btn btn-primary">Modifier</a>
                                <button class="btn btn-danger" onclick="deleteUserAdmin()">Supprimer</button>
                                <script>
                                    function deleteUserAdmin() {
                                        // Appeler la fonction deleteUserAdmin du contrôleur AccountsController
                                        // Utilisez ici la logique appropriée pour appeler la fonction du contrôleur
                                        // utiliser AJAX pour appeler la fonction deleteUserAdmin du contrôleur
                                        // code ajax pour appeler la fonction deleteUserAdmin du contrôleur



                                    }
                                </script>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Vous devez être connecté pour voir cette liste</p>
        <?php endif; ?>

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