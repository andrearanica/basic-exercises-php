<?php

class User {

    public $email;
    public $password;

    function setEmail ($email) {
        $this->email = $email;
    }

    function setPassword ($password) {
        $this->password = $password;
    }

    function getEmail () {
        return $this->email;
    }

    function getPassword () {
        return $this->password;
    }

}

// Returns the login form
function form ($error) {
    $header = '<div class="container my-5">';
    $body = '<h1>⚙️ Login</h1><form action="index.php" method="post"><input name="email" type="email" placeholder="Email"><input name="password" type="password" placeholder="Password"><input type="submit"></form>';
    if ($error) { $body = $body . '<b>Credenziali sbagliate</b>'; }
    $footer = '</div>';
    return $header . $body . $footer;
}

// Returns the dashboard
function dashboard () {
    return '<div class="container my-5"><h1>🥳 Benvenuto!</h1></div>';
}

// Return the error page, when email or password is wrong
function error () {
    return '<div class="container my-5"><h1>❌ Credenziali sbagliate</h1></div>';
}

// Check if login is correct
function login ($email, $password) {
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