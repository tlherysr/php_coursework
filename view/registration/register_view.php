<!DOCTYPE html>
<html lang="en">
<title> <?=$PAGE_TITLE ?> </title>
<?php include_once "../view/includes/head.php"; ?>
<body>

<?php include_once "../view/includes/nav.php"; ?>

<div class="register">

    <form method="POST">
    <div class="form-group container">
        <h1> Signup Form </h1>
        <label for="username">Username</label>
        <input class="form-control" type="text" id="username" name="username">
        
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password">
        
        <label for="firstName">First Name</label>
        <input class="form-control" type="text" id="firstName" name="firstName">

        <label for="lastName">Last Name</label>
        <input class="form-control" type="text" id="lastName" name="lastName">

        <label for="address">Address</label>
        <input class="form-control" type="text" id="address" name="address">

        <label for="phoneNo">Phone No</label>
        <input class="form-control" type="text" id="phoneNo" name="phoneNo">

        <label for="email">Email</label>
        <input class="form-control" type="text" id="email" name="email">
            
        <input class="btn btn-primary" type="submit" name="register" value="Register">
    </div>
</form>

</div>