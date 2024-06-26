<!DOCTYPE html>
<html lang="fr">

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
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-6">
                <h2>Cabinet Médical du Dr Dupont</h2>
                <p><br />Bienvenue sur le site du cabinet médical du Dr Dupont. Vous pouvez prendre rendez-vous en ligne, consulter vos rendez-vous, consulter les services proposés par le cabinet et mettre à jour vos informations personnelles.</p>
                <br />
                <a href="/create_appointment" class="btn btn-primary mb-2" style="margin-right: 5px;">Prendre rendez-vous</a>
                <br /><br />
                <?php
                //display the list of services in a bootstrap table for the collumns name description status only for services with status=published
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">Services</th>';
                echo '<th scope="col">Description</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($services as $service) {
                    if ($service['status'] == 'published') {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($service['name']) . '</td>';
                        echo '<td>' . htmlspecialchars(substr($service['description'], 0, 120)) . '... <a href="/show_services">En savoir plus</a></td>';
                        echo '</tr>';
                    }
                }
                echo '</tbody>';
                echo '</table>';
                ?>

            </div>
            <div class="col-md-6" style="text-align: center;">
                <!-- insérer les horaires d'ouverture -->
                <h4>Horaires d'ouverture</h4>
                <?php echo nl2br($shifts[0]['horaires']); ?>
                <br />

                
                <!-- insérer l'image /img/photo-cabinet-medical.png -->
                <img src="../img/photo-cabinet-medical.png" alt="photo du cabinet médical" class="img-fluid" height="auto" width="60%">
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