<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon compte</title>
</head>

<body>
    <?php include '../app/Views/header.php'; ?>
    <div class="container">
        <h1>Modifier mon compte</h1>
        <p>Vous pouvez mettre à jour les détails de votre compte.</p>


        <form action="/update_myaccount" method="POST">
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
        <input class="form-control" id="phone" name="phone" type="text" value="<?php echo $user['phone']; ?>" />
        <label for="phone">Téléphone</label>
    </div>

    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
    </form>
    </div>
</body>
<footer class="footer">
    <?php include '../app/Views/footer.php'; ?>
</footer>

</html>