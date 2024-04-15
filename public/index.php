<?php
namespace App\index;
require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\UsersController;
use App\Controllers\AppointmentsController;
use App\Controllers\ServicesController;

// Un routage très basique
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
if($path == '/index.php') {
    $controller = new HomeController();
    $controller->index();
} elseif($path == '/') {
    $controller = new HomeController();
    $controller->index();
} elseif($path == '/about') {
    $controller = new AboutController();
    $controller->about();
} elseif($path == '/login') {
    $controller = new LoginController();
    $controller->login();
} elseif($path == '/myaccount') {
    $controller = new UsersController();
    $controller->index();
} elseif($path == '/create_user') {
    $controller = new UsersController();
    $controller->createUser();
} elseif($path == '/admin') {
    $controller = new UsersController();
    $controller->indexAdmin();
} elseif($path == '/update_myaccount') {
    $controller = new UsersController();
    $controller->updateMyAccount();
} elseif($path == '/update_user_account') {
    $controller = new UsersController($_GET['id']);
    $controller->updateUser();
} elseif($path == '/change_password') {
    $controller = new UsersController();
    $controller->changePassword();
} elseif($path == '/submit_login') {
    $controller = new LoginController();
    $controller->submit_login();
} elseif($path == '/logout') {
    $controller = new LoginController();
    $controller->logout();
    //Administration
} elseif($path == '/manage_users') {
    $controller = new UsersController();
    $controller->getAllUsers();
} elseif($path == '/get_appointments') {
    $controller = new AppointmentsController();
    $controller->getAppointments();
} elseif($path == '/create_appointment') {
    $controller = new AppointmentsController();
    $controller->create();
// } elseif($path == '/update_appointment') {
//     $controller = new AppointmentsController();
//     $controller->update();
// } elseif($path == '/delete_appointment') {
//     $controller = new AppointmentsController();
//     $controller->delete();
// } elseif($path == '/show_appointment') {
//     $controller = new AppointmentsController();
//     $controller->show();
} elseif($path == '/list_services') {
    $controller = new ServicesController();
    $controller->list();
} elseif($path == '/update_services') {
    $controller = new ServicesController();
    $controller->updateService($_GET['id']);
} elseif($path == '/index2') {
    // afficher la page statique index2.php dans public
    include 'index2.html';
} else{
     // Gérer les autres chemins ou afficher une erreur 404
     echo "404 Not Found";
}