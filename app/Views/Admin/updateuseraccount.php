<?php
namespace App\Views\Admin;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un compte</title>
</head>
<body>
    <?php include '../app/Views/header.php'; ?>
    <div class="container">
    <h1>Modifier un compte</h1>
    <p>Vous pouvez mettre à jour les détails du compte utilisateur.</p>

    <form action="/update_user_account?id=<?php echo $user['id']; ?>" method="POST">
    <div class="form-floating mb-3" hidden>
        <input class="form-control" id="id" name="id" type="text" value="<?php echo $user['id']; ?>" />
        <label for="id">id</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="firstName" name="firstName" type="text" value="<?php echo $user['firstName']; ?>" />
        <label for="firstName">Nom</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="lastName" name="lastName" type="text" value="<?php echo $user['lastName']; ?>" />
        <label for="lastName">Prénom</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="email" name="email" type="email" value="<?php echo $user['email']; ?>" />
        <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="password" name="password" type="password" value="****" />
        <label for="password">Mot de passe</label>
    <div class="form-floating mb-3">
        <input class="form-control" id="phone" name="phone" type="text" value="<?php echo $user['phone']; ?>" />
        <label for="phone">Téléphone</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" id="role" name="role">
            <option value="patient" <?php if ($user['role'] == 'patient') echo 'selected'; ?>>Patient</option>
            <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            <option value="inactif" <?php if ($user['role'] == 'inactif') echo 'selected'; ?>>Inactif</option>
        </select>
        <label for="role">Rôle</label>
    </div>

    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
</form>
</div>

 <footer class="footer">
    <?php include '../app/Views/footer.php'; ?>
</footer>
</body>
</html>