<?php

namespace App\Controllers;

use App\Models\AppointmentsModel;
use App\Models\UserModel;

session_start();

class AppointmentsController
{
    private $appointmentsModel;

    public function __construct()
    {
        $this->appointmentsModel = new AppointmentsModel();
    }

    public function getAppointments()
    {
        // Récupérer tous les rendez-vous
        $appointments = $this->appointmentsModel->getAppointments();

        // Afficher la vue des rendez-vous
        include '../app/Views/Appointments/list.php';
    }

    public function show($id)
    {
        // Récupérer un rendez-vous spécifique
        $appointment = $this->appointmentsModel->getAppointment($id);
        // Afficher la vue du rendez-vous
        include '../app/Views/Appointments/show.php';
    }

    public function create()
    {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['LOGGED_USER'])) {
            // Rediriger vers la page de connexion et afficher un message d'erreur
            $_SESSION['ERROR_MESSAGE'] = 'Veuillez vous connecter pour accéder à cette page.';
            header('Location: /login');
            exit;
        } else {
            // récupérer l'id de l'utilisateur connecté à partir de la fonction getUserByEmail de UserModel
            $userModel = new UserModel();
            $user = $userModel->getUserByEmail($_SESSION['LOGGED_USER']['email']);

            // Traitement de la requête POST pour créer un nouveau rendez-vous
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Assurer la validation et l'assainissement des données ici
                $data = [
                    'bookingAt' => $_POST['bookingAt'],
                    'notes' => $_POST['notes'],
                    'serviceId' => $_POST['serviceId'],
                    'userId' => $user['id']
                ];

                $this->appointmentsModel->createAppointment($data);
                // Rediriger vers la liste des rendez-vous
                header('Location: /get_appointments');

        }
        // Afficher le formulaire de création de rendez-vous
        include '../app/Views/Appointments/create.php';
    }
    }

    public function update($id)
    {
        // Récupérer un rendez-vous spécifique
        $appointment = $this->appointmentsModel->getAppointment($id);

        // Traitement de la requête POST pour mettre à jour un rendez-vous
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Assurer la validation et l'assainissement des données ici
            $data = [
                'bookingAt' => $_POST['bookingAt'],
                'notes' => $_POST['notes'],
                'serviceId' => $_POST['serviceId'],
                'userId' => $_POST['userId'],
                'status' => $_POST['status']
            ];

            $this->appointmentsModel->updateAppointment($appointment['id'], $data);
            // Rediriger vers la liste des rendez-vous
            header('Location: /get_appointments');
            exit;
        }

        // Afficher le formulaire de mise à jour du rendez-vous
        include '../app/Views/Appointments/update.php';
    }


    public function delete($id)
    {
        // Supprimer un rendez-vous spécifique
        $this->appointmentsModel->deleteAppointment($id);
        // Rediriger vers la liste des rendez-vous
        header('Location: /appointments');
    }
}
