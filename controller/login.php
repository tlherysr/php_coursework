<?php

session_start();
require_once '../model/dataAccess.php';

if (isset($_SESSION['loggedin'])) {
    header('Location: home.php');
    exit;
}


if(isset($_POST['login'])) {

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $user = is_user($username);

    if ( $user ) {
        // FIXME: $password = "rasmuslerdorf"
        $validPassword = password_verify($password, $user->password);
        
        if ($validPassword) {
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $user->username;

            header('Location: home.php');
            exit;
            
        } else {
            die('Incorrect username / password combination!');
        }
    }
    
    else {
        die('Incorrect username / password combination!');        
    }
}


require_once "../view/login_view.php";
?>
