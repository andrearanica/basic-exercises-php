<?php



$dir = __DIR__ . '\images';

foreach ($_FILES as $file) {
    if (UPLOAD_ERR_OK === $file['error']) {
        $fileName = basename($file['name']);
        move_uploaded_file($file['tmp_name'], $dir.DIRECTORY_SEPARATOR.$fileName);
        
        header('Location: dashboard.php?error=null');
    } else {
        header('Location: dashboard.php?error=error');
    }
}

?>