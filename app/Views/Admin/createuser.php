<?php
namespace App\Views\Admin;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Créer un compte</title>
</head>
<body>
    <?php include '../app/Views/header.php'; 
    ?>
    <div class="container">
    <h1>Créer un compte</h1>
    <p>Vous pouvez créer un nouveau compte utilisateur.</p>

    <form action="/create_user" method="POST">
    <div class="form-floating mb-3">
        <input class="form-control" id="lastName" name="lastName" type="text" value="" />
        <label for="lastName">Prénom</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="firstName" name="firstName" type="text" value="" />
        <label for="firstName">Nom</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="password" name="password" type="password" value="" />
        <label for="password">Mot de passe</label>
    <div class="form-floating mb-3">
        <input class="form-control" id="email" name="email" type="email" value="" />
        <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="password" name="password" type="password" value="" />
        <label for="password">Mot de passe temporaire</label>
    <div class="form-floating mb-3">
        <input class="form-control" id="phone" name="phone" type="text" value="" />
        <label for="phone">Téléphone</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" id="role" name="role">
            <option value="patient" label="Patient">Patient</option>
            <option value="admin" label="Admin">Admin</option>
        </select>
        <label for="role">Rôle</label>
    </div>

    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
</form>
 </body>
</div>
</body>
 <footer class="footer">
    <?php include '../app/Views/footer.php'; ?>
</footer>

</html>