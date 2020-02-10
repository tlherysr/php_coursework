<!DOCTYPE html>
<html lang="en">
<title>Marauders - Sign Up</title>
<?php include_once "head.php"; ?>
<body>

<?php include_once "nav.php"; ?>

<div class="register">
  <form action="authenticate.php" method="post">
    <div class="container">
      <h1>Sign Up</h1>
      <p> Please enter the below to create an account.</p>
      <hr>
      <label for="Username"><b>Username</b></label>
      <input type="text" name="username" placeholder="Username" id="username" required>
      <label for="pwd"><b>Password</b></label>
      <input type="password" name="password" placeholder="Password" id="pwd" required>
      <label for="pwd-repeat"><b>Repeat Password</b></label>
      <input type="password" name="pwd-repeat" placeholder="Repeat Password" id="pwd-repeat" required>
    </div>
    <input type="submit" value="register">
  </form>
</div>
