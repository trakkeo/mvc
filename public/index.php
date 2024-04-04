<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MyAccountController;

// Un routage très basique
$path = $_SERVER['REQUEST_URI'];
if ($path == '/') {
    $controller = new HomeController();
    $controller->index();
} elseif($path == '/index.php') {
    $controller = new HomeController();
    $controller->index();
} elseif($path == '/about') {
    $controller = new AboutController();
    $controller->about();
} elseif($path == '/login') {
    $controller = new LoginController();
    $controller->login();
} elseif($path == '/myaccount') {
    $controller = new MyAccountController();
    $controller->index();
} elseif($path == '/update_myaccount') {
    $controller = new MyAccountController();
    $controller->updateMyAccount();
} elseif($path == '/change_password') {
    $controller = new MyAccountController();
    $controller->changePassword();
} elseif($path == '/submit_login') {
    $controller = new LoginController();
    $controller->submit_login();
} elseif($path == '/logout') {
    $controller = new LoginController();
    $controller->logout();
} else{
     // Gérer les autres chemins ou afficher une erreur 404
     echo "404 Not Found";
}