<?php
namespace App\Views\changepassword;



require_once '../app/Views/header.php';


if (!isset($_SESSION['LOGGED_USER'])) {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: /login.php');
    exit;
}

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


        <form method="POST" action="/change_password">
        <div class="form-floating mb-3">
                <input type="password" class="form-control" id="current_password" name="current_password" required>
                <label for="current_password">Mot de passe actuel:</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="new_password" name="new_password" required>
                <label for="new_password">Nouveau mot de passe:</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                <label for="confirm_password">Confirmez le nouveau mot de passe:</label>
            </div>

            <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
        </form>
    </div>

    <footer class="footer">
        <?php require_once '../app/Views/footer.php'; ?>
    </footer>
</body>
</html>
