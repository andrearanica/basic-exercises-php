<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <?php 
                require('login.php');
                if (isset($_POST['username']) || isset($_POST['pwd'])) {
                    if (login($_POST['username'], $_POST['pwd'])) {
                        echo '<h1>🚀 Benvenuto nella dashboard!</h1>Ciao <b>' . $_POST['username'] . '</b>. Gli account registrati sono:<br>';
                        $lines = file('accounts.txt');
                        foreach($lines as $line) {
                            echo ($line . '<br>');
                        }
                    } else {
                        header('Location: ./index.php?error=credentials');
                    }
                } else {
                    header('Location: ./index.php?error=nologin');
                }
            ?>
        </div>
    </body>
</html>