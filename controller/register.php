<?php

session_start();
require '../model/dataAccess.php';


if ( isset($_POST['register']) ) {

    //Retrieve the field values from our registration form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $firstName = !empty($_POST['firstName']) ? trim($_POST['firstName']) : null;
    $lastName = !empty($_POST['lastName']) ? trim($_POST['lastName']) : null;
    $address = !empty($_POST['address']) ? trim($_POST['address']) : null;
    $phoneNo = !empty($_POST['phoneNo']) ? trim($_POST['phoneNo']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    // $isAdmin = This is gonna be false default.

    $row = is_user($username);

    if ( $row ) {
        die('We have that username in the database. Try something else!');
    }

    $new_user = new Users();
    $new_user->username = $username;
    $new_user->password = $password;
    $new_user->firstName = $firstName;
    $new_user->lastName = $lastName;
    $new_user->address = $address;
    $new_user->phoneNo = $phoneNo;
    $new_user->email = $email;

    $result = insertUser($new_user);

    //If the signup process is successful.
    if ( $result ) {
        echo 'Thank you for registering with our website.';
    }
    else {
        echo 'somehing wrong!!';
    }

}

require_once "../view/register_view.php";

?>
