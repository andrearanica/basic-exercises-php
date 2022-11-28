<?php
unlink('./images/' . $_GET['file']);
header('Location: dashboard.php');
?>