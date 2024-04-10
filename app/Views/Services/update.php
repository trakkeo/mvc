<?php
namespace App\Views\Services;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un service</title>
</head>
<body>
    <?php include '../app/Views/header.php'; ?>
    <div class="container">
    <h1>Modifier un service</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt dolores nam reprehenderit numquam inventore dolorum optio tempora, minima repellat molestiae voluptates, magnam unde. Voluptates perferendis rerum, delectus exercitationem accusamus debitis.</p>

    // Form to update a service
    <form action="/update_service" method="POST">
    <div class="form-group">
        <label for="id">Id :</label>
        <input type="text" class="form-control" name="id" id="id" value="<?php echo $service['id']; ?>">
    <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $service['name']; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <input type="text" class="form-control" name="description" id="description" value="<?php echo $service['description']; ?>">
    </div>
    <div class="form-group">
        <label for="status">Status :</label>
        <select class="form-control" name="status" id="status">
            <option value="active" <?php echo $service['status'] === 'draft' ? 'selected' : ''; ?>>Brouillon</option>
            <option value="inactive" <?php echo $service['status'] === 'published' ? 'selected' : ''; ?>>Publié</option>
            <option value="inactive" <?php echo $service['status'] === 'archived' ? 'selected' : ''; ?>>Archivé</option>
        </select>
    </div>
    
            <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
            </form>



    <?php include '../app/Views/footer.php'; ?>
</body>
</html>