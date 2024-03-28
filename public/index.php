<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AboutController;
use App\Controllers\HomeController;
// Un routage très basique
$path = $_SERVER['REQUEST_URI'];
if ($path == '/') {
    $controller = new HomeController();
    $controller->index();
} elseif($path == '/about') {
    $controller = new AboutController();
    $controller->about();
}else{
     // Gérer les autres chemins ou afficher une erreur 404
     echo "404 Not Found";
}