<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <h1>👷🏻‍♂️ Dashboard</h1>
            <?php
                echo '<center><div class="row">';
                foreach(scandir('./images') as $img) {
                    if ($img != '.' && $img != '..') {
                        echo '<div class="col my-1"><img height="200" src="./images/' . $img . '"></div>';
                    }
                }
                echo '</div></center>';
            ?>
        
            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'null') {
                        echo '<div class="alert alert-success my-5 text-center">Caricamento avvenuto con <b>successo</b></div>';
                    } else {
                        echo '<div class="alert alert-warning my-5 text-center">C\'è stato un <b>errore</b>, riprova</div>';
                    }
                }
            ?>
            <form class="text-center" action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" name="upload" value="Carica file">
            </form>
        </div>
    </body>
</html>