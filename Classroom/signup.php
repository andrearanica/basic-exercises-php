<?php
    require('functions.php');
    
    if (checkInput()) {
        writeAccount($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $_POST['class']);
        header('Location: index.php?error=null');
    } else {
        header('Location: index.php?register=Register&error=invalidinput');
    }
    
?>