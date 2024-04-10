<?php
namespace App\Controllers;

use App\Models\ServicesModel;
session_start();

class ServicesController
{
    protected $servicesModel;

    public function __construct()
    {
        $this->servicesModel = new ServicesModel();
    }

    public function list()
    {
        // Code pour afficher tous les services
        $servicesModel = new ServicesModel();
        $services = $servicesModel->getAllServices();
        include '../app/views/services/list.php';
    }

    public function create()
    {
        // Code pour afficher le formulaire de création d'un service
    }

    public function store()
    {
        // Code pour enregistrer un nouveau service dans la base de données
    }

    public function show($id)
    {
        // Code pour afficher les détails d'un service spécifique
    }

    public function updateService($id)
    {
        // récupérer l'ID du service à mettre à jourdans l'url
        $serviceId = $_GET['id'];
        // récupérer les informations du service à mettre à jour
        $service = $this->servicesModel->getService($serviceId);
        // afficher le formulaire de mise à jour du service
        include '../app/views/services/update.php';
        // si le formulaire est soumis, mettre à jour le service
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'duration' => $_POST['duration'],
                'id' => $serviceId
            ];
            $this->servicesModel->updateService($data['id'], $data);
            // rediriger vers la liste des services
            header('Location: /list_services');
        }

    }

    public function update($id)
    {
        // Code pour mettre à jour les informations d'un service dans la base de données
    }

    public function destroy($id)
    {
        // Code pour supprimer un service de la base de données
    }
}