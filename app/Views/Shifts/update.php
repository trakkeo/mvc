<?php

namespace App\Views\Shifts;

// Inclure la classe Database
use App\Config\Database;

// Instancier un objet Database
$db = new Database();
$conn = $db->conn;

// Récupérer le contenu existant du champ 'horaires' depuis la base de données
$query = "SELECT horaires FROM shifts LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(\PDO::FETCH_ASSOC);
$horaires = $row['horaires'];

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer le nouveau contenu du champ 'horaires' depuis le formulaire
    $nouveauxHoraires = $_POST['horaires'];

    // Mettre à jour le champ 'horaires' dans la base de données
    $updateQuery = "UPDATE shifts SET horaires = :horaires LIMIT 1";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bindParam(':horaires', $nouveauxHoraires, \PDO::PARAM_STR);
    $stmt->execute();

    // Rediriger vers une page de succès ou afficher un message de succès
    header('Location: /');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horaires d'ouverture</title>
</head>

<body>
    <?php include '../app/Views/header.php'; ?>
    <div class="container">
        <h1>Horaires d'ouverture</h1>
        <p>Vous pouvez mettre à jour les horaires d'ouverture du cabinet.</p>
        <form method="POST" action="">
            <label for="horaires">Horaires :</label><br>
            <textarea name="horaires" id="horaires" rows="9" cols="40"><?php echo $horaires; ?></textarea><br>

            <input type="submit" value="Enregistrer les modifications">
        </form>
    </div>

        <footer class="footer">
        <?php include '../app/Views/footer.php'; ?>
        </footer>
</body>

</html>