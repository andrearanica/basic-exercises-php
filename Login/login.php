<?php
function login ($username, $pwd) {
    $lines = file('accounts.txt');
    foreach($lines as $line) {
        $data = explode(' ', $line);
        $temp = substr( $data[1], 0, -2 );
        // echo "ascii : " . ord( substr( $data[1], -1 ) );
        // echo $data[0] . ' ' . $temp . '-';
        if ($data[0] == $username && $temp == $pwd) {
            return true;
        }
    }
    return false;
}
?>