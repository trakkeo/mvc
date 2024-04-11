<?php

namespace App\Views;

use App\Models\UserModel;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cabinet Medical</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="C:\xampp\htdocs\mvc\public\js\js.js"></script>
    <script src="https://kit.fontawesome.com/d91517610f.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Cabinet Medical</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <?php
                        if (isset($_SESSION['LOGGED_USER'])) {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="/myaccount">Mon Compte</a>';
                            echo '</li>';
                        } else {
                        } ?>
                        <?php
                        // call isAdmin method from UserModel to check if user is an admin
                        if (isset($_SESSION['LOGGED_USER'])) {
                            $userModel = new UserModel();
                            $isAdmin = $userModel->isAdmin($_SESSION['LOGGED_USER']['email']);
                            if ($isAdmin) {

                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin">Admin</a>
                                </li>
                        <?php
                            } else {
                            }
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['LOGGED_USER'])) {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="/logout"><i class="fa-regular fa-user"></i> Déconnexion</a>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="/login">Connexion</a>';
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>