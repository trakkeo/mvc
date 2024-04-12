<?php

namespace App\Controllers;

use App\Models\AppointmentsModel;

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
        include '../app/views/appointments/list.php';
    }

    public function show($id)
    {
        // Récupérer un rendez-vous spécifique
        $appointment = $this->appointmentsModel->getAppointment($id);
        // Afficher la vue du rendez-vous
        include '../app/views/appointments/show.php';
    }

    public function create()
    {
        //créer une instance du modèle de rendez-vous
        $appointmentsModel = new AppointmentsModel();
        // Récupérer les informations de l'utilisateur à partir de la session
        //$user = $appointmentsModel->getUserByEmail($_SESSION['email']);
        // Afficher le formulaire de création de rendez-vous
        include '../app/views/appointments/create.php';
        // Créer un nouveau rendez-vous
        $data = [
            'bookingAt' => $_POST['bookingAt'],
            'notes' => $_POST['notes'],
            'serviceId' => $_POST['serviceId'],
            'userId' => $_POST['userId']
        ];


        $this->appointmentsModel->createAppointment($data);
        // Rediriger vers la liste des rendez-vous
        header('Location: /appointments');
    }


    public function update($id)
    {

        }
    

    public function delete($id)
    {
        // Supprimer un rendez-vous spécifique
        $this->appointmentsModel->deleteAppointment($id);
        // Rediriger vers la liste des rendez-vous
        header('Location: /appointments');
    }

}
?>