<?php

function validateData (&$data) {
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
}

function login ($email, $password) {
    validateData($email); validateData($password);
    $file = fopen('accounts.json', 'r');
    $json = fread($file, filesize('accounts.json'));
    $json = json_decode($json);
    foreach ($json as &$value) {
        if ($email == $value->email && $password == $value->password) {
            return true;
        }
    }
    return false;
}

?>