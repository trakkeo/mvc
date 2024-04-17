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

<!-- conteneur bootstrap 50/50 -->
<div class="row" style="margin-top: 1em;">
    <div class="col-md-6">

    <h1>Mon Compte</h1>
    <p>Vous pouvez consulter et modifier les détails de votre compte.</p>

    <?php if // if user is logged in, display user details
(isset($_SESSION['LOGGED_USER'])) :
    // display user details in a responsive bootstrap table
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<tr>';
    echo '<th>Prénom</th>';
    echo '<th>Nom</th>';
    echo '<th>Email</th>';
    echo '<th>Téléphone</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>' . $user['firstName'] . '</td>';
    echo '<td>' . $user['lastName'] . '</td>';
    echo '<td>' . $user['email'] . '</td>';
    echo '<td>' . $user['phone'] . '</td>';
    echo '</tr>';
    echo '</table>';
    echo '</div>';

    // ajouter un bouton bootstrap pour mettre à jour le profil
    echo '<br><br><a href="/update_myaccount" class="btn btn-primary mb-2" style="margin-right: 5px;">Modifier mon profil</a><br><br>';

    // ajouter un bouton bootstrap pour changer le mot de passe
    echo '<a href="/change_password" class="btn btn-primary mb-2" style="margin-right: 5px;">Changer le mot de passe</a><br><br>';

    // si l'utilisateur n'est pas connecté, afficher un message d'erreur class = "alert alert-danger"

else :
    echo '<div class="alert alert-danger" role="alert">Vous devez être connecté pour voir les détails de votre compte.</div>';
endif;


?>
    
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
