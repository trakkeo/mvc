<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une actualité</title>
</head>

<body>
    <?php include '../app/Views/header.php'; ?>
    <div class="container">
        <h1>Modifier une actualité</h1>
        <p>Vous pouvez mettre à jour les détails de l'actualité.</p>

        <form action="/update_news?id=<?php echo $news['id']; ?>" method="POST">
            <div class="form-group">
                <div class="form-floating mb-3">
                    <input class="form-control" id="title" name="title" type="text" value="<?php echo $news['title']; ?>" />
                    <label for="title">Titre de l'actualité</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="content" name="content"><?php echo $news['content']; ?></textarea>
                    <label for="content">Contenu</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" id="status" name="status">
                        <option value="draft" <?php echo $news['status'] === 'draft' ? 'selected' : ''; ?>>Brouillon</option>
                        <option value="published" <?php echo $news['status'] === 'published' ? 'selected' : ''; ?>>Publié</option>
                        <option value="archived" <?php echo $news['status'] === 'archived' ? 'selected' : ''; ?>>Archivé</option>
                    </select>
                    <label for="status">Statut</label>
                </div>
                <div class="form-floating mb-3">
                    <input class hidden="form-control" id="userId" name="userId" type="text" value="<?php echo $news['userId']; ?>" /> 
                </div>

                <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
            </div>
        </form>

        <?php include '../app/Views/footer.php'; ?>
</body>

</html>