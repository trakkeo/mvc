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

        <?php foreach ($news as $new):
        if ($new['status'] == 'published') { ?>

<div style="border: 1px solid lightgray; padding: 10px; margin-bottom: 10px; border-radius: 10px; background-color: #f0f8f0;">
    <h3><?php echo $new['title']; ?></h3>
    <p><?php echo $new['content']; ?></p>
    <?php $user = $userModel->getUserById($new['userId']); ?>
    <p>Publié le <?php echo date('d/m/Y', strtotime($new['createdAt'])); ?> par <?php echo $user['firstName'] . ' ' . $user['lastName']; ?></p>
</div>

<?php } endforeach; ?>

    </div>
</body>
    <footer class="footer">
        <?php include '../app/Views/footer.php'; ?>
    </footer>