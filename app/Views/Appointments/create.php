<?php
namespace AppViews\Appointments;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre un rendez-vous</title>
</head>

<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <h1>Prendre un rendez-vous</h1>
        <p>Vous pouvez prendre un rendez-vous en remplissant le formulaire ci-dessous.</p>

        <?php if (isset($_SESSION['account_inactif'])) {
            echo '<p class="alert alert-danger">' . $_SESSION['account_inactif'] . '</p>';
            // Unset the session variable so the message doesn't keep appearing
            unset($_SESSION['account_inactif']);
        }
        ?>
        <!-- creer un formulaire pour prendre un rendez-vous en bootstrap -->
        <form action="/create_appointment" method="POST">
            <div class="form-group">
                <!-- creer un champ pour la date et l'heure du rendez-vous -->
                <label for="bookingAt">Date et heure du rendez-vous :</label>
                <input type="datetime-local" class="form-control" name="bookingAt" id="bookingAt" step="1800">
                <!-- creer un champ pour les notes du rendez-vous -->
                <label for="notes">Notes :</label>
                <textarea class="form-control" name="notes" id="notes"></textarea>
                <!-- creer un champ pour le service du rendez-vous -->
                <label for="serviceId">Service :</label>
                <select class="form-control" name="serviceId" id="serviceId">
                    <option value="1">Soins dentaires courants</option>
                    <option value="2">Orthodontie</option>
                    <option value="3">Implantologie</option>
                </select>

                <input type="submit" class="btn btn-primary" value="Prendre un rendez-vous">
        </form>


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