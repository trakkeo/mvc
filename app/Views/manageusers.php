<?php
namespace App\Views\manageusers;
use App\Models\UserModel;


?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <!-- intégrer le header -->
    <?php include 'header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

    <h1>Gestion des utilisateurs</h1>
    <p>Consultation, création et modification des comptes utilisateurs</p>

    <?php
        // if the user is logged in display all users in a table
        if (isset($_SESSION['LOGGED_USER'])) {
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Id</th>';
            echo '<th>Firstname</th>';
            echo '<th>Lastname</th>';
            echo '<th>Email</th>';
            echo '<th>Phone</th>';
            echo '</tr>';
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user['id'] . '</td>';
                echo '<td>' . $user['firstName'] . '</td>';
                echo '<td>' . $user['lastName'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '<td>' . $user['phone'] . '</td>';
                echo '<td>' . $user['role'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>You need to be logged in to see the users list.</p>';
        }


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