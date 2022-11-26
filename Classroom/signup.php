<?php
    require('functions.php');
    
    if (checkInput()) {
        writeAccount($_GET['name'], $_GET['surname'], $_GET['email'], $_GET['password'], $_GET['class']);
        header('Location: index.php?error=null');
    } else {
        header('Location: index.php?error=invalidinput');
    }
    
?>