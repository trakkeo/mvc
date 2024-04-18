<?php
namespace App\Views\Services;

use App\Models\ServicesModel;

$servicesModel = new ServicesModel();
$services = $servicesModel->getAllServices();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>Liste des services</title>
</head>

<body>
    <!-- intégrer le header -->
    <?php include '../app/Views/header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">

        <h1>Liste des services</h1>

        <?php foreach ($services as $service):
        if ($service['status'] == 'published') { ?>

<div style="border: 1px solid lightgray; padding: 10px; margin-bottom: 10px; border-radius: 10px; background-color: #f0f8f0;">
    <h3><?php echo $service['name']; ?></h3>
    <p><?php echo nl2br($service['description']); ?></p>
</div>


<?php } endforeach; ?>

    </div>
</body>
    <footer class="footer">
        <?php include '../app/Views/footer.php'; ?>
    </footer>