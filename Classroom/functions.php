<?php

class User {

    public $name;
    public $surname;
    public $email;
    public $password;
    public $class;

    function __construct($name, $surname, $email, $password, $class) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->class = $class;
    }

}

function showLogin () {
    echo '
    <h1>⚙️ Login</h1>
    <form action="index.php" method="GET">
        <input type="email"     id="email"    name="email"      class="form-control" placeholder="Email">
        <input type="password"  id="password" name="password"   class="form-control" placeholder="Password">
        <input type="submit"    id="button"   class="form-control" id="classe">
    </form>
    <form action="index.php" method="GET">
        <center><input type="submit" name="register" id="register" class="form-control" value="Register"></center>
    </form>
    ';
}

function showSignup () {
    echo '
    <h1>🔎 Registrazione</h1>
    <form action="signup.php" method="GET">
        <input type="text"     name="name"    id="name"     class="form-control" placeholder="Nome">
        <input type="text"     name="surname" id="surname"  class="form-control" placeholder="Cognome">
        <input type="email"    name="email"   id="email"    class="form-control" placeholder="Email">
        <input type="password" name="password"   id="password" class="form-control" placeholder="Password">
        <input type="text"     name="class"  id="class"    class="form-control" placeholder="Classe">
        <input type="submit"                 id="class"    class="form-control">
    </form>
    ';
}

function checkInput () {
    if ($_GET['name'] != "" && $_GET['surname'] != "" && $_GET['email'] != "" && $_GET['password'] != "" && $_GET['class'] != "") {
        return true;
    } else {
        return false;
    }
}

function writeAccount () {
    $user = new User($_GET['name'], $_GET['surname'], $_GET['email'], $_GET['password'], $_GET['class']);
    
    $file = fopen('accounts.json', 'r');
    $json = fread($file, filesize('accounts.json'));
    $json = json_decode($json);
    array_push($json, $user);
    $json = json_encode($json);
    file_put_contents('accounts.json', $json);
}

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