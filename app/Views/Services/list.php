<?php
namespace App\Views\Services;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Liste des Services</title>
</head>

<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <h1>Liste des Services</h1>
        <p>Consultation des services</p>

        <?php
        //display the list of services in a bootstrap table for the collumns name description status
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Id</th>';
        echo '<th scope="col">Nom</th>';
        echo '<th scope="col">Description</th>';
        echo '<th scope="col">Status</th>';
        echo '<th scope="col">Actions</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($services as $service) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($service['id']) . '</td>';
            echo '<td>' . htmlspecialchars($service['name']) . '</td>';
            echo '<td>' . htmlspecialchars($service['description']) . '</td>';
            echo '<td>' . htmlspecialchars($service['status']) . '</td>';
            echo '<td>';
            echo '<a href="/update_service?id=' . $service['id'] . '" class="btn btn-primary mb-2" style="margin-right: 5px;">Modifier</a>';
            echo '<a href="/delete_service?id=' . $service['id'] . '" class="btn btn-danger mb-2" style="margin-right: 5px;">Supprimer</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </div>
    <footer class="footer">
        <?php include '../app/Views/footer.php'; ?>
    </footer>