<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>

<body>
    <!-- intégrer le header -->
    <?php include 'header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <!-- conteneur bootstrap 50/50 -->
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-12">
                <h2>Contact</h2>
                <p>Vous pouvez nous contacter par téléphone ou par email.</p>
                <br />
                <p>Numéro de téléphone: 01 23 45 67 89</p>
                <!-- insérer un formulaire de contact public function sendEmail($name, $email, $message) -->
                <form action="/send_email" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="name" type="text"/>
                        <label for="name">Nom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email"/>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" name="message"></textarea>
                        <label for="message">Message</label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Envoyer">
                </form>


            </div>
        </div>
        </div>
        </div>
<footer class="footer">
    <?php
    // insérer le footer 
    require_once 'footer.php';
    ?>
</footer>
</body>

</html>