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

    public function edit($id)
    {
        // Code pour afficher le formulaire d'édition d'un service
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