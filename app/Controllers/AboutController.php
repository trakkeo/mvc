<?php 
namespace App\Controllers;

//session_start();

class AboutController
{
    public function about()
    {
        include '../app/Views/about.php';
    }
  
}