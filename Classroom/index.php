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
                if (isset($_POST['email'])) {
                    if (login($_POST['email'], $_POST['password'])) {
                        header('Location: dashboard.php');
                    } else {
                        header('Location: index.php?error=credentials');
                    }
                } else {
                    showLogin();
                    if (isset($_GET['error'])) { 
                        if ($_GET['error'] == 'credentials') {
                            echo '<div class="alert alert-danger my-5 text-center"><b>Credenziali errate</b></div>';
                        } else if ($_GET['error'] == 'null') {
                            echo '<div class="alert alert-success my-5 text-center"><b>Account registrato</b>, effettua il login per continuare</div>';
                        } else {
                            echo '<div class="alert alert-danger my-5 text-center">C\'è stato un errore, <b>riprova</b></div>';
                        }
                    }
                }
            } else {
                showSignup();
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'invalidinput') {
                        echo '<div class="alert alert-danger my-5 text-center"><b>Account non creato</b> | Dati mancanti o errati</div>';  
                    }
                }
            }
        ?>
        </div>
    </body>
</html>