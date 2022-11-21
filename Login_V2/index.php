<!DOCTYPE html>
<html>
    <head>
        <title>Login V2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
        <?php
            // Basic functions
            require('functions.php');
            // If the user did login
            if (isset($_POST['email'])) {
                // If email and password valid
                if (login($_POST['email'], $_POST['password'])) {
                    echo dashboard();
                } else {
                    header('Location: ' . $_SERVER['PHP_SELF'] . '?error=login');
                }
            // Show the login 
            } else {
                // Check to show error
                if (isset($_GET['error'])) {
                    // Show the form with error
                    if ($_GET['error'] == 'login') {
                        $form = form('Credenziali sbagliate');
                    } else {
                        $form = form('C\'è stato un errore, prova più tardi');
                    }
                } else { 
                    $form = form(false); 
                }
                echo $form;
            }
        ?>
        </div>
    </body>
</html>