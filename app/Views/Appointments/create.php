<?php
namespace AppViews\Appointments;

?>
<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
</head>
<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

    <h1>Prendre un rendez-vous</h1>
    <p>Vous pouvez prendre un rendez-vous en remplissant le formulaire ci-dessous.</p>


<!-- creer un formulaire pour prendre un rendez-vous en bootstrap -->
<form action="/create_appointment" method="POST">
<div class="form-group">
    <!-- creer un champ pour la date et l'heure du rendez-vous -->
    <label for="bookingAt">Date et heure du rendez-vous :</label>
    <input type="datetime-local" class="form-control" name="bookingAt" id="bookingAt">
    <!-- creer un champ pour les notes du rendez-vous -->
    <label for="notes">Notes :</label>
    <textarea class="form-control" name="notes" id="notes"></textarea>
    <!-- creer un champ pour le service du rendez-vous -->
    <label for="serviceId">Service :</label>
    <select class="form-control" name="serviceId" id="serviceId">
        <option value="1">Médecine Génerale</option>
        <option value="2">Renouvellement d'ordonnance</option>
        <option value="3">Demande de ceetificat Médical</option>
    </select>

    <input type="submit" class="btn btn-primary" value="Prendre un rendez-vous">
</form>

    

</div>
<!-- intégrer le footer -->
<?php include '../app/Views/footer.php'; ?>
</body>
</html>
