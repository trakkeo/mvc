<?php
namespace App\Views\Admin\updateuseraccount;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un compte</title>
</head>
<body>
    <?php include '../app/Views/header.php'; ?>
    <div class="container">
    <h1>Modifier un compte</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt dolores nam reprehenderit numquam inventore dolorum optio tempora, minima repellat molestiae voluptates, magnam unde. Voluptates perferendis rerum, delectus exercitationem accusamus debitis.</p>


    <form action="/update_user_account" method="POST">
    <div class="form-group">
        <label for="id">Id :</label>
        <input type="text" class="form-control" name="id" id="id" value="<?php echo $user['id']; ?>">
    <div class="form-group">
        <label for="firstName">Nom :</label>
        <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $user['firstName']; ?>">
    </div>

    <div class="form-group">
        <label for="lastName">Prénom :</label>
        <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $user['lastName']; ?>">
    </div>

    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>">
    </div>

    <div class="form-group">
        <label for="phone">Téléphone :</label>
        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user['phone']; ?>">
    </div>
    <div class="form-group">
        <label for="role">Rôle :</label>
        <select class="form-control" name="role" id="role">
            <option value="patient" <?php echo $user['role'] === 'patient' ? 'selected' : ''; ?>>patient</option>
            <option value="admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>admin</option>
        </select>
    </div>

        <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
        </form>

    <?php include '../app/Views/footer.php'; ?>
</body>
</html>