<!DOCTYPE html>
<html lang="en">
<title> <?=$PAGE_TITLE?> </title>
<?php require_once "../view/includes/head.php"; ?>
<body>

<?php include_once "../view/includes/nav.php"; ?>

<div class="login">
  <h1>Login</h1>
  <p id="please-login">Please login using your username and password:</p>
    <form method="post">
      <label for="username">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="username" placeholder="Username" id="username" required>
      <label for="password">
        <i class="fas fa-lock"></i>
      </label>
      <input type="password" name="password" placeholder="Password" id="password" required>
      <input type="submit" name="login" value="Login">
  </form>
</div>
</body>