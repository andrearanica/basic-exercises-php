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
            if (!isset($_POST['register'])) {
                if (isset($_GET['email'])) {
                    if (login($_GET['email'], $_GET['password'])) {
                        header('Location: dashboard.php');
                    } else {
                        header('Location: index.php?error=credentials');
                    }
                } else {
                    echo '
                    <h1>⚙️ Login</h1>
                    <form action="index.php" method="GET">
                        <input type="email"     id="email"    name="email"      class="form-control" placeholder="Email">
                        <input type="password"  id="password" name="password"   class="form-control" placeholder="Password">
                        <center><input type="submit" id="button"></center>
                    </form>
                    <form action="index.php" method="POST">
                        <center><input type="submit" name="register" value="Register"></center>
                    </form>
                    ';
                    if (isset($_GET['error'])) { 
                        if ($_GET['error'] == 'credentials') {
                            echo '<div class="alert alert-danger my-5">Credenziali errate</div>';
                        }
                    }
                }
            } else {
                echo '<h1>🔎 Registrazione</h1>';
            }
        ?>
        </div>
    </body>
</html>