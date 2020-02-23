<!DOCTYPE html>
<html lang="en">
<title>Marauders - login</title>
<?php include_once "head.php"; ?>
<body>

<?php include_once "nav.php"; ?>

<div class="login">
  <h1>Login</h1>
  <p id="please-login">Please login using your username and password:</p>
    <form action="authenticate.php" method="post">
      <label for="username">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="username" placeholder="Username" id="username" required>
      <label for="password">
        <i class="fas fa-lock"></i>
      </label>
      <input type="password" name="password" placeholder="Password" id="password" required>
      <input type="submit" value="Login">
  </form>
</div>
</body>