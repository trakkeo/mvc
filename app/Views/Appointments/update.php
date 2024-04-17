<?php
namespace App\Views\Appointments;
use App\Models\UserModel;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un rendez-vous</title>
</head>
<body>
    <?php include '../app/Views/header.php'; ?>
    <div class="container">
    <h1>Modifier un rendez-vous</h1>
    <?php $user = $userModel->getUserById($appointment['userId']); ?>
    <h3>Mettre à jour les détails du rendez-vous pour</h3><h3 style="color: #1abc9c;"><?php echo $user['firstName'] . ' ' . $user['lastName']; ?>.</h3>

    <form action="/update_appointment?id=<?php echo $appointment['id']; ?>" method="POST">
    <div class="form-group">
    <div class="form-floating mb-3">
    <input class="form-control" id="bookingAt" name="bookingAt" type="datetime-local" value="<?php echo $appointment['bookingAt']; ?>" />
    <label for="bookingAt">Date et heure du rendez-vous</label>
    <div class="form-floating mb-3">
    <input class hidden="form-control" id="userId" name="userId" type="text" value="<?php echo $appointment['userId']; ?>" />
    <input class="form-control" id="notes" name="notes" type="text" value="<?php echo $appointment['notes']; ?>" />
    <label for="notes">Notes</label>
    <div class="form-floating mb-3">
    <select class="form-control" id="serviceId" name="serviceId" type="text" value="<?php echo $appointment['serviceId']; ?>">
    <option value="1" <?php echo $appointment['serviceId'] === '1' ? 'selected' : ''; ?>>Médecine Génerale</option>
    <option value="2" <?php echo $appointment['serviceId'] === '2' ? 'selected' : ''; ?>>Renouvellement d'ordonnance</option>
    <option value="3" <?php echo $appointment['serviceId'] === '3' ? 'selected' : ''; ?>>Demande de certificat Médical</option>
    </select>
    <label for="serviceId">Service</label>
    <div class="form-floating mb-3">
    <select class="form-control" id="status" name="status" type="text" value="<?php echo $appointment['status']; ?>">
    <option value="attenteValidation" <?php echo $appointment['status'] === 'attenteValidation' ? 'selected' : ''; ?>>En attente</option>
    <option value="confirme" <?php echo $appointment['status'] === 'confirme' ? 'selected' : ''; ?>>Confirmé</option>
    <option value="annule" <?php echo $appointment['status'] === 'annule' ? 'selected' : ''; ?>>Annulé</option>
    <option value="archive" <?php echo $appointment['status'] === 'archive' ? 'selected' : ''; ?>>Archivé</option>
    </select>
    <label for="status">Status</label>

    
    </div>
    
            <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
            </form>



    <?php include '../app/Views/footer.php'; ?>
</body>
</html>