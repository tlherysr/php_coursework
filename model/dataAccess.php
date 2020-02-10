<?php 

require_once "db_classes.php";
require_once "connect.php";

function is_user($username) {
    global $pdo;
    $sql = "SELECT username, password FROM Users WHERE username = :username";
    $statement = $pdo->prepare($sql);
    
    //Bind value.
    $statement->bindValue(':username', $username);

    //Set Fetch Mode 
    $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Users'); 

    //Execute
    $statement->execute();
    $user = $statement->fetch();
    
    return $user;
}


function insertUser($new_user) {
    global $pdo;
    
    //Get Uniq ID
    $id = uniqid();
    
    // Hash the password
    $hashedPassword = password_hash("$new_user->password", PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (id, username, password, firstName, lastName, address, phoneNo, email) VALUES (:id, :username, :password, :firstName, :lastName, :address, :phoneNo, :email)";
    $statement = $pdo->prepare($sql);
    
    //Bind the variables.
    $statement->bindValue(':id', $id);
    $statement->bindValue(':username', $new_user->username);
    $statement->bindValue(':password', $hashedPassword);
    $statement->bindValue(':firstName', $new_user->firstName);
    $statement->bindValue(':lastName', $new_user->lastName);
    $statement->bindValue(':address', $new_user->address);
    $statement->bindValue(':phoneNo', $new_user->phoneNo);
    $statement->bindValue(':email', $new_user->email);

    //Execute the statement and insert the new account.
    $result = $statement->execute();
    return $result;
}


function fetch_user_profile($username) {
    global $pdo;
    $sql = "SELECT username, password, email, firstName, lastName, address, phoneNo FROM Users WHERE username = :username";
    $statement = $pdo->prepare($sql);
    
    //Bind value.
    $statement->bindValue(':username', $username);

    //Set Fetch Mode 
    $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Users'); 

    //Execute
    $statement->execute();
    $user = $statement->fetch();
    
    return $user;
}


?>
