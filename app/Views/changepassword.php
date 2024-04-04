<?php
namespace App\Views\changepassword;

use App\Models\UserModel;


require_once 'header.php';

$userModel = new UserModel();

if (!isset($_SESSION['LOGGED_USER'])) {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: login.php');
    exit;
}

$user = $userModel->getUserByEmail($_SESSION['LOGGED_USER']['email']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier mon compte</title>
</head>
<body>
    <div class="container">
        <h1>Changer mon mot de passe</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt dolores nam reprehenderit numquam inventore dolorum optio tempora, minima repellat molestiae voluptates, magnam unde. Voluptates perferendis rerum, delectus exercitationem accusamus debitis.</p>

        <?php
        // appeller la méthode changePassword du contrôleur MyAccountController
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            $isValid = true;

            if ($newPassword !== $confirmPassword) {
                echo '<p class="alert alert-danger">Les mots de passe ne correspondent pas!</p>';
                $isValid = false;
            }

            if ($isValid) {
                $userModel->changePassword($user['id'], $currentPassword, $newPassword);
                echo '<p class="alert alert-success">Mot de passe changé avec succès!</p>';
            }
        }
        ?>

        <form method="POST" action="/change_password">
            <div class="form-group">
                <label for="current_password">Mot de passe actuel:</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="new_password">Nouveau mot de passe:</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmez le nouveau mot de passe:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
        </form>
    </div>

    <footer class="footer">
        <?php require_once 'footer.php'; ?>
    </footer>
</body>
</html>
