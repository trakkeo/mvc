<?php

namespace AppViews\News;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
</head>

<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <h1>Créer une actualité</h1>
        <p>Vous pouvez créer une actualité en remplissant le formulaire ci-dessous.</p>


        <!-- creer un formulaire pour prendre un rendez-vous en bootstrap -->
        <form action="/create_news" method="POST">
            <div class="form-group">
                <div class="form-floating mb-3">
                    <!-- creer un champ pour le titre de l'actualité -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" name="title" type="text" />
                        <label for="name">Titre</label>
                    </div>
                    <!-- creer un champ pour le contenu de l'actualité -->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="content" id="content"></textarea>
                        <label for="content">Contenu</label>
                    </div>
                    <!-- creer un champ pour le status de l'actualité -->
                    <div class="form-floating mb-3">
                        <select class="form-control" id="status" name="status">
                            <option value="draft">Brouillon</option>
                            <option value="published">Publié</option>
                            <option value="archive">Archivé</option>
                        </select>
                        <label for="status">Status</label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Créer une actualité">
                </div>


        </form>



    </div>
    </div>
    <footer class="footer">
        <?php
        // insérer le footer 
        require_once '../app/Views/footer.php';
        ?>
    </footer>
</body>

</html>