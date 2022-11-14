<?php
    if ($_POST['username'] == 'admin' && $_POST['pwd'] == 'admin') {
        echo('Accesso effettuato');
    } else {
        echo('Credenziali errate');
    }
?>