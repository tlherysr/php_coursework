<?php

session_start();

if ( isset($_SESSION['loggedin']) ) { 
    unset($_SESSION['loggedin']);
    unset($_SESSION['isAdmin']);
    unset($_SESSION['cart']);

    // Redirect to the login page:
    header('Location: login.php');
    exit;
}

else {
    die('you are not logged in.');
}

?>