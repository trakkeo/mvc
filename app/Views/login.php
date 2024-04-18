<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <!-- intégrer le header -->
    <?php include 'header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">
        <h1>Connectez-vous</h1>
    <!-- Si utilisateur est identifié, on redirige vers la page d'accueil -->
        <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
            <p>Vous êtes déjà connecté(e) en tant que <?php echo $_SESSION['LOGGED_USER']['email']; ?></p>
            <a href="/" class="btn btn-primary mb-2" style="margin-right: 5px;">Retour à la page d'accueil</a>
        <?php endif; ?>
    <!-- Si utilisateur/trice est non identifié(e), on affiche le formulaire -->
        <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
            <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                    unset($_SESSION['LOGIN_ERROR_MESSAGE']);
                    ?>
                </div>

            <?php endif; ?>
            <div><p>Vous n'avez pas de compte ? <a href="/contact">Faites une demande de création de compte en ligne</a></p></br>
                </div>
            <form action="/submit_login" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
                    <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            <?php endif; ?>
    </div>
    </div>

    <!-- insérer le footer avec la classe footer -->
    <footer class="footer">
        <?php require_once 'footer.php'; ?>
    </footer>
</body>

