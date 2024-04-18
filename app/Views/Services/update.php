<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un service</title>
</head>
<body>
    <?php include '../app/Views/header.php'; ?>
    <div class="container">
    <h1>Modifier un service</h1>
    <p>Vous pouvez mettre à jour les détails du service.</p>

    <form action="/update_services?id=<?php echo $service['id']; ?>" method="POST">
    <div class="form-group">
    <div class="form-floating mb-3">
        <input class="form-control" id="name" name="name" type="text" value="<?php echo $service['name']; ?>" />
        <label for="name">Nom du service</label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" id="description" name="description"><?php echo $service['description']; ?></textarea>
        <label for="description">Description</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-control" id="status" name="status" type="text" value="<?php echo $service['status']; ?>">
            <option value="draft" <?php echo $service['status'] === 'draft' ? 'selected' : ''; ?>>Brouillon</option>
            <option value="published" <?php echo $service['status'] === 'published' ? 'selected' : ''; ?>>Publié</option>
            <option value="archive" <?php echo $service['status'] === 'archived' ? 'selected' : ''; ?>>Archivé</option>
        </select>
        <label for="status">Status</label>
    </div>
    
            <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
            </form>



    <?php include '../app/Views/footer.php'; ?>
</body>
</html>