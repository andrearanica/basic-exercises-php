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
                if (isset($_POST['email'])) {
                    register($_POST['email'], md5($_POST['password']), $_POST['cf'], $_POST['cell']);
                    header('Location: index.php');
                } else {
                    echo signupForm();
                }
            ?>
        </div>
    </body>
</html>