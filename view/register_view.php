<!doctype html>
<html>
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<center>
<h1>Register</h1>
</center>

<form method="POST">
    <div class="col-md-4 col-md-offset-4 form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" id="username" name="username"><br><br>
        
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password"><br><br>
        
        <label for="firstName">First Name</label>
        <input class="form-control" type="text" id="firstName" name="firstName"><br><br>

        <label for="lastName">Last Name</label>
        <input class="form-control" type="text" id="lastName" name="lastName"><br><br>

        <label for="address">Address</label>
        <input class="form-control" type="text" id="address" name="address"><br><br>

        <label for="phoneNo">Phone No</label>
        <input class="form-control" type="text" id="phoneNo" name="phoneNo"><br><br>

        <label for="email">Email</label>
        <input class="form-control" type="email" id="email" name="email"><br><br>
            
        <input class="btn btn-primary" type="submit" name="register" value="Register">
    </div>
</form>


</body>
</html>