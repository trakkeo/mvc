<?php

namespace App\Views\Admin\manageusers;



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
                                <a href="/update_myaccount?email=<?= urlencode($user['email']) ?>" class="btn btn-primary">Modifier</a>
                                <button class="btn btn-danger">Supprimer</button>
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