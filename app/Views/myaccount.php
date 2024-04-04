<?php
namespace App\Views\myaccount;
use App\Models\UserModel;


?>
<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
</head>
<body>
    <!-- intégrer le header -->
    <?php include 'header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

    <h1>Mon Compte</h1>
    <p>Vous pouvez consulter et modifier les détails de votre compte.</p>

    <?php if // if user is logged in, display user details
(isset($_SESSION['LOGGED_USER'])) :
    // create an instance of the UserModel
    $userModel = new UserModel();
    $user = $userModel->getUserByEmail($_SESSION['LOGGED_USER']['email']);
    //display user details in a bootstrap table
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

    // ajouter un bouton bootstrap pour mettre à jour le profil
    echo '<a href="/update_myaccount" class="btn btn-primary mb-2" style="margin-right: 5px;">Modifier mon profil</a>';

    // ajouter un bouton bootstrap pour changer le mot de passe
    echo '<a href="/change_password" class="btn btn-primary mb-2" style="margin-right: 5px;">Changer le mot de passe</a>';

    // ajouter un bouton bootstrap pour supprimer le compte
    echo '<a href="/delete_account" class="btn btn-danger mb-2" style="margin-right: 5px;">Supprimer le compte</a>';

    // si l'utilisateur n'est pas connecté, afficher un message d'erreur class = "alert alert-danger"

else :
    echo '<div class="alert alert-danger" role="alert">Vous devez être connecté pour voir les détails de votre compte.</div>';
endif;


?>
    
</div>
<div>    
<footer class="footer">
<?php
// insérer le footer 
require_once 'footer.php'; 
?>
</footer>
</div>
</body>
</html>