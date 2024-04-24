<?php 
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ServicesModel;
use App\Models\AppointmentsModel;
use App\Models\ShiftsModel;

//session_start();

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

        //call function getshifts from shiftsmodel
        $shiftsModel = new ShiftsModel();
        $shifts = $shiftsModel->getShifts();


       include '../app/Views/home.php';
    }    
    
  
}