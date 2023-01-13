<!DOCTYPE html>
<html>
    <head>
        <title>Registro elettronico</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            th, td {
                border: 2px solid black;
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container my-5 text-center">
            <h1>Seleziona uno studente</h1>
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
                    $sql = 'SELECT student_id, name_surname FROM students WHERE class="5ID"';
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['student_id'] . '">' . $row['name_surname'] . '</option>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Nessuno studente trovato</div>';
                    }

                    ?>
                </select>
                <input type="submit" class="form-control my-1" />
            </form><br /><hr /><br />
            <?php

            if (isset($_REQUEST['student_id'])) {
                echo '<h4>Tutti i voti</h4>';

                $ip = '127.0.0.1';
                $username = 'root';
                $pwd = '';
                $database = 'pagella';
                $connection = new mysqli($ip, $username, $pwd, $database);

                if ($connection->connect_error) {
                    die('C\'è stato un errore: ' . $connection->connect_error);
                }

                // echo 'Database collegato';
                $sql = 'SELECT mark, subject FROM marks WHERE student_id="' . $_REQUEST['student_id'] . '"';
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    echo '<center><table class="my-4"><tr><th>Materia</th><th>Voto</th></tr>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['subject'] . '</td><td>' . $row['mark'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table></center>';
                } else {
                    echo '<div class="alert alert-warning my-4">Non è stato trovato nessun voto per questo alunno</div>';
                }
            }

            ?>

            <?php

            if (isset($_REQUEST['student_id'])) {
                echo '<h4>Inserisci un voto</h4>';
                echo '<form method="GET" action="index.php" class="my-4">
                    <input name="student_id" value="' . $_REQUEST["student_id"] . '" type="number" hidden>
                    <input name="mark"       placeholder="Voto">
                    <input name="subject"    placeholder="Materia">
                    <input type="submit">
                </form>';
            }

            ?>

            <?php

            if (isset($_REQUEST['mark'])) {
                if ($_REQUEST['mark'] != '' && $_REQUEST['subject'] != '') {

                
                    $ip = '127.0.0.1';
                    $username = 'root';
                    $pwd = '';
                    $database = 'pagella';
                    $connection = new mysqli($ip, $username, $pwd, $database);

                    if ($connection->connect_error) {
                        die('C\'è stato un errore: ' . $connection->connect_error);
                    }

                    $sql = "INSERT INTO marks (mark, student_id, subject) VALUES ('" . $_REQUEST['mark'] . "', '" . $_REQUEST['student_id'] . "', '" . $_REQUEST['subject'] . "');";
                    $connection->query($sql);
                    header('Location: index.php?student_id=' . $_REQUEST['student_id']);
                } else {
                    echo '<div class="alert alert-danger my-4">Inserisci i dati correttamente</div>';
                }
            }

            if (isset($_REQUEST['student_id'])) {
                echo '<h4>Pagella</h4>';

                $sql = 'SELECT subject, AVG(mark) FROM `marks` WHERE student_id=' . $_REQUEST['student_id'] . ' GROUP BY subject';
                $result = $connection->query($sql);
                $insufficiencies = 0;
                $rInsufficiencies = 0;
                if ($result->num_rows > 0) {
                    echo '<center><table><th>Materia</th><th>Media aritmetica</th><th>Media arrotondata</th>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['subject'] . '</td><td>' . round($row['AVG(mark)'], 3) . '</td><td>' . round($row['AVG(mark)']) . '</td>';
                        echo '</tr>';
                        if ($row['AVG(mark)'] < 6) {
                            $insufficiencies++;
                        }
                        if (round($row['AVG(mark)']) < 6) {
                            $rInsufficiencies++;
                        }
                    }
                    echo '</table></center>';
                }

                if ($insufficiencies > 3) {
                    echo '<div class="alert alert-danger my-4"><b>Questo studente è bocciato</b></div>';
                } else if ($insufficiencies > 0) {
                    echo '<div class="alert alert-warning my-4"><b>Questo studente è rimandato in ' . $insufficiencies . ' materie</b> secondo la media aritmetica o in <b>' . $rInsufficiencies . ' materie</b> secondo la media arrotondata</div>';
                } else {
                    echo '<div class="alert alert-success my-4"><b>Questo studente è promosso</b></div>';
                }
            }

            ?>
        </div>
    </body>
</html>