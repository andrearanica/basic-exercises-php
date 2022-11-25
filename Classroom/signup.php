<?php
    require('functions.php');
    
    if (checkInput()) {
        writeAccount();
        header('Location: index.php');
    } else {
        header('Location: index.php?error=invalidinput');
    }
    
?>