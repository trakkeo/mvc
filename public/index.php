<?php

namespace App\index;

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\UsersController;
use App\Controllers\AppointmentsController;
use App\Controllers\ServicesController;
use App\Controllers\EmailController;
use App\Controllers\NewsController;
use App\Controllers\ShiftsController;

session_start();

// inclure le modèle UserModel
use App\Models\UserModel;

// pour vérifier si l'utilisateur est connecté
$isLogged = false;
if (isset($_SESSION['LOGGED_USER'])) {
    $isLogged = true;
}

// pour vérifier si l'utilisateur connecté est admin
$userModel = new UserModel();
$isAdmin = false;
if ($isLogged) {
    $isAdmin = $userModel->isAdmin($_SESSION['LOGGED_USER']['email']);
}

// pour vérifier si l'utilisateur connecté est inactif
$isInactif = false;
if ($isLogged) {
    $isInactif = $userModel->isInactif($_SESSION['LOGGED_USER']['email']);
}
// si l'utilisateur est inactif, rediriger vers la page contact avec message d'erreur
if ($isInactif) {
    $_SESSION['account_inactif'] = 'Votre compte est inactif. Veuillez contacter le cabinet afin de le réactiver. Pour consulter le site en tant que visiteur, cliquez sur <a href="/logout">Déconnexion</a>.';
    // Check if the user is already on the contact page or trying to logout
    if ($_SERVER['REQUEST_URI'] !== '/contact' && $_SERVER['REQUEST_URI'] !== '/logout') {
        header('Location: /contact');
        exit;
    }
}


// routage basique
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
if ($path == '/index.php') {
    $controller = new HomeController();
    $controller->index();
} elseif ($path == '/') {
    $controller = new HomeController();
    $controller->index();
} elseif ($path == '/about') {
    $controller = new AboutController();
    $controller->about();
} elseif ($path == '/register') {
    $controller = new UsersController();
    $controller->register();
} elseif ($path == '/login') {
    $controller = new LoginController();
    $controller->login();
} elseif ($path == '/myaccount') {
    if ($isLogged) {
        $controller = new UsersController();
        $controller->index();
    } else {
        header('Location: login');
        exit;
    }
} elseif ($path == '/create_user') {
    if ($isLogged && $isAdmin) {
        $controller = new UsersController();
        $controller->createUser();
    } else {
        header('Location: adminonly');
        exit;
    }
} elseif ($path == '/admin') {
    if ($isLogged && $isAdmin) {
        $controller = new UsersController();
        $controller->indexAdmin();
    } else {
        header('Location: adminonly');
        exit;
    }
} elseif ($path == '/adminonly') {
    $controller = new UsersController();
    $controller->adminOnly();
} elseif ($path == '/update_myaccount') {
    if ($isLogged) {
        $controller = new UsersController();
        $controller->updateMyAccount();
    } else {
        header('Location: login');
        exit;
    }
} elseif ($path == '/update_user_account') {
    if ($isLogged && $isAdmin) {
        $controller = new UsersController($_GET['id']);
        $controller->updateUser();
    } else {
        header('Location: adminonly');
        exit;
    }
} elseif ($path == '/change_password') {
    if ($isLogged) {
        $controller = new UsersController();
        $controller->changePassword();
    } else {
        header('Location: login');
        exit;
    }
} elseif ($path == '/submit_login') {
    $controller = new LoginController();
    $controller->submit_login();
} elseif ($path == '/logout') {
    $controller = new LoginController();
    $controller->logout();
} elseif ($path == '/contact') {
    $controller = new EmailController();
    $controller->index();
} elseif ($path == '/send_email') {
    $controller = new EmailController();
    $controller->sendEmail($_POST['name'], $_POST['email'], $_POST['message']);
} elseif ($path == '/manage_users') {
    if ($isLogged && $isAdmin) {
        $controller = new UsersController();
        $controller->getAllUsers();
    } else {
        header('Location: adminonly');
        exit;
    }
} elseif ($path == '/get_appointments') {
    if ($isLogged && $isAdmin) {
        $controller = new AppointmentsController();
        $controller->getAppointments();
     } elseif ($isLogged){
        $controller = new AppointmentsController();
        $controller->getUserAppointments();
    } else {
        header('Location: login');
        exit;
    }
} elseif ($path == '/create_appointment') {
    if ($isLogged) {
    $controller = new AppointmentsController();
    $controller->create();
    } else {
        header('Location: login');
        exit;
    }
} elseif ($path == '/update_appointment') {
    if ($isLogged && $isAdmin) {
        $controller = new AppointmentsController();
        $controller->update($_GET['id']);
    } else {
        header('Location: adminonly');
        exit;
    }
} elseif ($path == '/delete_appointment') {
    if ($isLogged && $isAdmin) {
        $controller = new AppointmentsController();
        $controller->delete($_GET['id']);
    } else {
        header('Location: adminonly');
        exit;
    }
    // } elseif($path == '/show_appointment') {
    //     $controller = new AppointmentsController();
    //     $controller->show();
} elseif ($path == '/list_services') {
    $controller = new ServicesController();
    $controller->list();
} elseif ($path == '/update_services') {
    if ($isLogged && $isAdmin) {
        $controller = new ServicesController();
        $controller->updateService($_GET['id']);
    } else {
        header('Location: adminonly');
        exit;
    }
} elseif ($path == '/show_services') {
    $controller = new ServicesController();
    $controller->showServices();
} elseif ($path == '/list_news') {
    $controller = new NewsController();
    $controller->list();
} elseif ($path == '/create_news') {
    if ($isLogged && $isAdmin) {
        $controller = new NewsController();
        $controller->createNews();
    } else {
        header('Location: adminonly');
        exit;
    }
} elseif ($path == '/update_news') {
    if ($isLogged && $isAdmin) {
        $controller = new NewsController($_GET['id']);
        $controller->updateNews();
    } else {
        header('Location: adminonly');
        exit;
    }
} elseif ($path == '/show_news') {
    $controller = new NewsController();
    $controller->showNews();
} elseif ($path == '/update_shifts') {
    if ($isLogged && $isAdmin) {
        $controller = new ShiftsController();
        $controller->updateShifts();
    } else {
        header('Location: adminonly');
        exit;
    }
} else {
    // Gérer les autres chemins ou afficher une erreur 404
    echo "404 Not Found";
}
