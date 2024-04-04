<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <!-- intégrer le header -->
    <?php include 'header.php'; ?>
    <!-- insérer un contenant pour le contenu de la page -->
    <div class="container">
        <h1>Page d'accueil</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt dolores nam reprehenderit numquam inventore dolorum optio tempora, minima repellat molestiae voluptates, magnam unde. Voluptates perferendis rerum, delectus exercitationem accusamus debitis.</p>

        <?php
        // if the user is logged in display all users in a table
        if (isset($_SESSION['LOGGED_USER'])) {
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Id</th>';
            echo '<th>Firstname</th>';
            echo '<th>Lastname</th>';
            echo '<th>Email</th>';
            echo '<th>Phone</th>';
            echo '</tr>';
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user['id'] . '</td>';
                echo '<td>' . $user['firstName'] . '</td>';
                echo '<td>' . $user['lastName'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '<td>' . $user['phone'] . '</td>';
                echo '<td>' . $user['role'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>You need to be logged in to see the users list.</p>';
        }



        // stylish form to create a new user with bootstrap form classes
        echo '<form action="index.php?action=createUser" method="post">';
        echo '<div class="mb-3">';
        echo '<label for="firstName" class="form-label">Firstname</label>';
        echo '<input type="text" class="form-control" id="firstName" name="firstName">';
        echo '</div>';
        echo '<div class="mb-3">';
        echo '<label for="lastName" class="form-label">Lastname</label>';
        echo '<input type="text" class="form-control" id="lastName" name="lastName">';
        echo '</div>';
        echo '<div class="mb-3">';
        echo '<label for="email" class="form-label">Email</label>';
        echo '<input type="email" class="form-control" id="email" name="email">';
        echo '</div>';
        echo '<div class="mb-3">';
        echo '<label for="password" class="form-label">Password</label>';
        echo '<input type="password" class="form-control" id="password" name="password">';
        echo '</div>';
        echo '<div class="mb-3">';
        echo '<label for="phone" class="form-label">Phone</label>';
        echo '<input type="text" class="form-control" id="phone" name="phone">';
        echo '</div>';
        echo '<div class="mb-3">';
        echo '<label for="role" class="form-label">Role</label>';
        echo '<input type="text" class="form-control" id="role" name="role">';
        echo '</div>';
        echo '<button type="submit" class="btn btn-primary">Create user</button>';
        echo '</form>';

        ?>

    </div>

    <footer class="footer">
        <?php
        // insérer le footer 
        require_once 'footer.php';
        ?>
    </footer>
</body>

</html>