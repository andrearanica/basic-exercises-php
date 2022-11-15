<?php
function login ($username, $pwd) {
    $lines = file('accounts.txt');
    foreach($lines as $line) {
        $data = explode(' ', $line);
        if ($data[0] == $username && $data[1] == $pwd) {
            return true;
        }
    }
    return false;
}
?>