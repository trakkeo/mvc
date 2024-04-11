<?php 
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ServicesModel;
use App\Models\AppointmentsModel;

session_start();

class HomeController
{
    public function index()
    {
        //call function getallusers from usermodel
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        //call function getallservices from servicesmodel
        $servicesModel = new ServicesModel();
        $services = $servicesModel->getAllServices();


       include '../app/views/home.php';
    }    
    
  
}