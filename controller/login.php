<?php

session_start();
require_once '../model/dataAccess.php';

if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}


if(isset($_POST['login'])) {

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $user = is_user($username);

    if ( $user ) {
        $validPassword = password_verify($password, $user->password);
        
        if ($validPassword) {
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $user->username;
            $_SESSION['userID'] = $user->id;
            $_SESSION['isAdmin'] = $user->isAdmin;
            $_SESSION['cart'] = array();
            header('Location: index.php');
            exit;
            
        } else {
            die('Incorrect username / password combination!');
        }
    }
    
    else {
        die('Incorrect username / password combination!');        
    }
}

require_once "../view/includes/a_config.php";
require_once "../view/registration/login_view.php";
?>
