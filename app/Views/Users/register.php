<?php
namespace App\Views\Users;
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

    <form action="/register" method="POST">
    <div class="form-floating mb-3">
        <input class="form-control" id="lastName" name="lastName" type="text" value="" required />
        <label for="lastName">Prénom</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="firstName" name="firstName" type="text" value="" required />
        <label for="firstName">Nom</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="password" name="password" type="password" value="" required />
        <label for="password">Mot de passe</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="email" name="email" type="email" value="" required />
        <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="phone" name="phone" type="text" pattern="[0-9]{10}" value="" required />
        <label for="phone">Téléphone</label>
    </div>
    <input type="hidden" id="role" name="role" value="patient" />

    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
</form>
 </body>
</div>
</body>
 <footer class="footer">
    <?php include '../app/Views/footer.php'; ?>
</footer>

</html>