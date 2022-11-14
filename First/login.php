<?php
function login ($username, $pwd) {
    $r = false;
    $lines = file('accounts.txt');
    foreach($lines as $line) {
        $data = explode(' ', $line);
        echo $data[0] . ' ' . $data[1] . '<br>';
        if ($username == $data[0] && $pwd == $data[1]) {
            $r = true;
        }
    }
    return $r;
}
?>