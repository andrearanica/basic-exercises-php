<!DOCTYPE html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            #login {
                border: 2px solid black;
                border-radius: 25px;
                padding: 20px;
                width: 50%;
                background-color: #ccffff;
            }
        </style>
    </head>
    <body>
        <div class="container my-5 text-center" id="login">
            <h1>Login</h1>
            <form action="./dashboard.php" method="post">
                Username<br> <input type="text" name="username"><br>
                Password<br> <input type="password" name="pwd"><br>
                <br><input type="submit">
            </form>
            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'nologin') {
                        echo '<br><b style="color: red">Effettua il login con il form</b>';
                    } else if ($_GET['error'] == 'credentials') {
                        echo '<br><b style="color: red">Credenziali errate</b>';
                    }
                }
            ?>
        </div>
    </body>
</html>