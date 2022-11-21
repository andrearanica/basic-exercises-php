<!DOCTYPE html>
<html>
    <head>
        <title>Registrati</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <h1>🚀 Registrati</h1>
            <?php
                require("functions.php");
                // Register user if data is ok
                if (isset($_POST['email'])) {
                    if (register($_POST['email'], md5($_POST['password']), $_POST['cf'], $_POST['cell'])) {
                        header('Location: index.php');
                    } else {
                        header('Location: signup.php?error=alreadyused');
                    }
                // Show the form
                } else {
                    echo signupForm();
                    // Check for errors
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'alreadyused') {
                            echo '<b>Email o codice fiscale già utilizzati</b>';
                        } else {
                            echo '<b>C\'è stato un errore, riprova più tardi</b>';
                        }
                    }
                }
            ?>
        </div>
    </body>
</html>