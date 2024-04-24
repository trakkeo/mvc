<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page reservée aux administrateurs</title>
</head>


<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <!-- conteneur bootstrap 50/50 -->
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-6">
                <h2><span style="font-size: 1em; color: Tomato;"><i class="fa fa-lock" aria-hidden="true"></i></span> Page reservée aux administrateurs</h2>
                <h3></h3>
                <p>vous pouvez vous connecter en tant qu'administrateur pour accéder à cette page ou vous pouvez retourner à la page d'accueil</p>
                <a href="/" class="btn btn-primary mb-2" style="margin-right: 5px;">Retour à la page d'accueil</a>
                <a href="/login" class="btn btn-primary mb-2" style="margin-right: 5px;">Se connecter</a>
        </div>
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