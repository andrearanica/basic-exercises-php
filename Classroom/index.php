<!DOCTYPE html>
<html>
    <head>
        <title>Classroom</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="./style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container my-5">
        <?php
            require('functions.php');
            if (!isset($_GET['register'])) {
                if (isset($_GET['email'])) {
                    if (login($_GET['email'], $_GET['password'])) {
                        header('Location: dashboard.php');
                    } else {
                        header('Location: index.php?error=credentials');
                    }
                } else {
                    showLogin();
                    if (isset($_GET['error'])) { 
                        if ($_GET['error'] == 'credentials') {
                            echo '<div class="alert alert-danger my-5 text-center"><b>Credenziali errate</b></div>';
                        } else if ($_GET['error'] == 'invalidinput') {
                            echo '<div class="alert alert-danger my-5 text-center"><b>Account non creato</b> | Dati mancanti</div>';  
                        } else {
                            echo '<div class="alert alert-danger my-5 text-center">C\'è stato un errore, <b>riprova</b></div>';
                        }
                    }
                }
            } else {
                showSignup();
            }
        ?>
        </div>
    </body>
</html>