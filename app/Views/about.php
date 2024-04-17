<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos du Dr. Dupont</title>
</head>

<body>
    <!-- intégrer le header -->
    <?php include 'header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">
        <br />
        <h1>À propos du Dr. Dupont</h1>
        <p>Le Dr. Dupont est un professionnel de la santé passionné par son travail. Il a acquis une solide expérience dans le domaine médical et est reconnu pour ses compétences exceptionnelles.</p>
        <h2>Parcours professionnel</h2>
        <p>Le Dr. Dupont a obtenu son diplôme de médecine à l'Université de Paris. Il a ensuite complété sa résidence à l'Hôpital Saint-Louis, où il s'est spécialisé en cardiologie.</p>
        <h2>Qualifications</h2>
        <ul>
            <li>Docteur en médecine</li>
            <li>Spécialiste en cardiologie</li>
            <li>Membre de l'Association française de cardiologie</li>
        </ul>
        <h2>L'équipe du Dr. Dupont</h2>
        <p>L'équipe du Dr. Dupont est composée de professionnels dévoués qui travaillent ensemble pour offrir les meilleurs soins possibles à leurs patients. Parmi les membres de l'équipe, on compte :</p>
        <ul>
            <li>Marie Martin, infirmière en chef</li>
            <li>Paul Dubois, technicien en radiologie</li>
            <li>Camille Leroy, assistante médicale</li>
        </ul>
    </div>
    <footer class="footer">
        <?php
        // insérer le footer 
        require_once 'footer.php';
        ?>
    </footer>
</body>

</html>