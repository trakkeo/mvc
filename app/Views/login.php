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

    <!-- Si utilisateur/trice est non identifié(e), on affiche le formulaire -->
        <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
            <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                    unset($_SESSION['LOGIN_ERROR_MESSAGE']);
                    ?>
                </div>
            <?php endif; ?>
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

    <!-- insérer le footer -->
    <?php include 'footer.php'; ?>