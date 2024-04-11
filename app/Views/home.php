<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet Médical du Dr Dupont</title>
</head>


<body>
    <!-- intégrer le header -->
    <?php include 'header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">
        
        <!-- conteneur bootstrap 50/50 -->
        <div class="row" style="margin-top: 4em;">
            <div class="col-md-6">
                <h1>Cabinet Médical du Dr Dupont</h1>
                <p><br />Bienvenue sur le site du cabinet médical du Dr Dupont. Vous pouvez prendre rendez-vous en ligne, consulter vos rendez-vous, consulter les services proposés par le cabinet et mettre à jour vos informations personnelles.</p>
                <?php
                //display the list of services in a bootstrap table for the collumns name description status
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">Services</th>';
                echo '<th scope="col">Description</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($services as $service) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($service['name']) . '</td>';
                    echo '<td>' . htmlspecialchars($service['description']) . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
                ?>
                <button class="btn btn-primary">Prendre rendez-vous</button>
                <button class="btn btn-primary">Consultez mes rendez-vous</button>
            </div>
            <div class="col-md-6">
                <!-- insérer l'image /img/photo-cabinet-medical.png -->
                <img src="../img/photo-cabinet-medical.png" alt="photo du cabinet médical" class="img-fluid">
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