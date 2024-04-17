<?php
namespace App\Views\Appointments;
use App\Models\NewsModel;
use App\Models\UserModel;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>Liste des actualités</title>
</head>

<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <h1>Liste des actualités</h1>
        <p>Consultation et gestion des actualités</p>

        <a href="/create_news" class="btn btn-primary mb-2" style="margin-right: 5px;">Créer une actualité</a>

        <?php
        if (isset($_SESSION['LOGGED_USER'])) :
            $userModel = new UserModel();
            $isAdmin = $userModel->isAdmin($_SESSION['LOGGED_USER']['email']);
            if ($isAdmin) {
                // display message if user is an admin
                echo '<p>Vous êtes connecté en tant qu\'administrateur</p>';
                // display the list of news in a bootstrap table
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">Id</th>';
                echo '<th scope="col">Titre</th>';
                echo '<th scope="col">Contenu</th>';
                echo '<th scope="col">Date de publication</th>';
                echo '<th scope="col">Utilisateur</th>';
                echo '<th scope="col">Status</th>';
                echo '<th scope="col">Actions</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($news as $new) {
                    echo '<tr>';
                    echo '<td>' . $new['id'] . '</td>';
                    echo '<td>' . $new['title'] . '</td>';
                    echo '<td>' . $new['content'] . '</td>';
                    echo '<td>' . $new['createdAt'] . '</td>';
                    echo '<td>' . $new['userId'] . '</td>';
                    echo '<td>' . $new['status'] . '</td>';
                    echo '<td>';
                    echo '<a href="/update_news?id=' . $new['id'] . '" class="btn btn-primary mb-2" style="margin-right: 5px;">Modifier</a>';
                    echo '</td>';
                    echo '</tr>';
                }

                
            } else {
                // display message if user is not an admin
                echo '<p>Vous n\'êtes pas autorisé à voir cette liste</p>';
            }
        endif;
        ?>
        </tbody>
        </table>
    </div>
    </div>
</body>
    <footer class="footer">
        <?php include '../app/Views/footer.php'; ?>
    </footer>