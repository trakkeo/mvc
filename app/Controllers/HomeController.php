<?php 
namespace App\Controllers;

use App\Models\UserModel;

session_start();

class HomeController
{
    public function index()
    {
        //call function getallusers from usermodel
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();


       include '../app/views/home.php';
    }    
    
  
}