<?php

class User {

    public $email;
    public $password;
    public $cf;
    public $cell;

    function __construct($email, $password, $cf, $cell) {
        $this->email = $email;
        $this->password = $password;
        $this->cf = $cf;
        $this->cell = $cell;
    }

    function setEmail ($email) {
        $this->email = $email;
    }

    function setPassword ($password) {
        $this->password = $password;
    }

    function setCf ($cf) {
        $this->cf = $cf;
    }
    
    function setCell ($cell) {
        $this->cell = $cell;
    }

    function getEmail () {
        return $this->email;
    }

    function getPassword () {
        return $this->password;
    }

    function getCf () {
        return $this->cf;
    }

    function getCell () {
        return $this->cell;
    }

}

// Returns the login form
function form ($error) {
    $header = '<div class="container my-5">';
    $body = '<h1>⚙️ Login</h1><form action="index.php" method="post"><input name="email" type="email" placeholder="Email"><input name="password" type="password" placeholder="Password"><input type="submit"></form><a href="signup.php">Registrati</a><br>';
    if ($error) { $body = $body . '<b>Credenziali sbagliate</b>'; }
    $footer = '</div>';
    return $header . $body . $footer;
}

function signupForm () {
    return '<form action="signup.php" method="post">
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="text" name="cf" placeholder="Codice fiscale"><br>
    <input type="text" name="cell" placeholder="Cellulare"><br>
    <input type="submit">
    </form>';
}

// Returns the dashboard
function dashboard () {
    return '<div class="container my-5"><h1>🥳 Benvenuto!</h1></div>';
}

function validateData (&$data) {
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
}

// Check if login is correct
function login ($email, $password) {
    validateData($email); validateData($password);
    $file = fopen('accounts.json', 'r');
    $json = fread($file, filesize('accounts.json'));
    $json = json_decode($json);
    foreach ($json as &$value) {
        if ($email == $value->email && md5($password) == $value->password) {
            return true;
        }
    }
    return false;
}

function register ($email, $password, $cf, $cell) {
    validateData($email); validateData($password); validateData($cf); validateData($cell);
    
    $user = new User($email, $password, $cf, $cell);
    
    $file = fopen('accounts.json', 'r');
    $json = fread($file, filesize('accounts.json'));
    $json = json_decode($json);
    array_push($json, $user);

    $json = json_encode($json);
    file_put_contents('accounts.json', $json);
}

?>