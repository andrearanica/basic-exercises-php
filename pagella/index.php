<!DOCTYPE html>
<html>
    <head>
        <title>Registro elettronico</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5 text-center">
        <form method="GET" action="index.php">
            <select name="student_id" class="form-control my-1">
                <?php

                $ip = '127.0.0.1';
                $username = 'root';
                $pwd = '';
                $database = 'pagella';
                $connection = new mysqli($ip, $username, $pwd, $database);

                if ($connection->connect_error) {
                    die('C\'è stato un errore: ' . $connection->connect_error);
                }

                // echo 'Database collegato';
                $sql = 'SELECT nome_cognome, id_studente FROM studenti WHERE classe="5ID"';
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_studente'] . '">' . $row['nome_cognome'] . '</option>';
                    }
                }

                ?>
            </select>
            <input type="submit" class="form-control my-1" />
        </form>
        <?php

        if (isset($_REQUEST['student_id'])) {
            $ip = '127.0.0.1';
            $username = 'root';
            $pwd = '';
            $database = 'pagella';
            $connection = new mysqli($ip, $username, $pwd, $database);

            if ($connection->connect_error) {
                die('C\'è stato un errore: ' . $connection->connect_error);
            }

            // echo 'Database collegato';
            $sql = 'SELECT voto, materia FROM voti WHERE id_studente="' . $_REQUEST['student_id'] . '"';
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<p>' . $row['materia'] . ': ' . $row['voto'] . '</p>';
                }
            }

            echo '<h1>Pagella</h1>';

            $sql = 'SELECT materia, AVG(voto) FROM `voti` WHERE id_studente=' . $_REQUEST['student_id'] . ' GROUP BY materia ';
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<p>' . $row['materia'] . ': ' . $row['AVG(voto)'] . '</p>';
                }
            }

        }

        ?>
        </div>
    </body>
</html>