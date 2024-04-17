<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <div class="col-md-6">
                <h2>Contact</h2>
                <p>Vous pouvez nous contacter par téléphone ou par email.</p>
                <br />
                <p>Numéro de téléphone: 01 23 45 67 89</p>
        <!-- insérer un formulaire de contact public function sendEmail($name, $email, $message) -->
        <form action="/send_email" method="post">
            <div class="form-group
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" id="name">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message"></textarea>
            <input type="submit" class="btn btn-primary" value="Envoyer">
            
</form>


<?php
// insérer le footer 
require_once 'footer.php'; 
?>
</footer>
</body>

</html>