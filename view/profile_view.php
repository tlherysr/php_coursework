<!doctype html>
<html>
<head>
  <title>Profile Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    .navtop {
        background-color: #2f3947;
        height: 60px;
        width: 100%;
        border: 0;
    }
    .navtop div {
        display: flex;
        margin: 0 auto;
        width: 1000px;
        height: 100%;
    }
    .navtop div h1, .navtop div a {
        display: inline-flex;
        align-items: center;
    }
    .navtop div h1 {
        flex: 1;
        font-size: 24px;
        padding: 0;
        margin: 0;
        color: #eaebed;
        font-weight: normal;
    }
    .navtop div a {
        padding: 0 20px;
        text-decoration: none;
        color: #c1c4c8;
        font-weight: bold;
    }
    .navtop div a i {
        padding: 2px 8px 0 0;
    }
    .navtop div a:hover {
        color: #eaebed;
    }
    body.loggedin {
        background-color: #f3f4f7;
    }
    .content {
        width: 1000px;
        margin: 0 auto;
    }
    .content h2 {
        margin: 0;
        padding: 25px 0;
        font-size: 22px;
        border-bottom: 1px solid #e0e0e3;
        color: #4a536e;
    }
    .content > p, .content > div {
        box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
        margin: 25px 0;
        padding: 25px;
        background-color: #fff;
    }
    .content > p table td, .content > div table td {
        padding: 5px;
    }
    .content > p table td:first-child, .content > div table td:first-child {
        font-weight: bold;
        color: #4a536e;
        padding-right: 15px;
    }
    .content > div p {
        padding: 5px;
        margin: 0 0 10px 0;
    }
</style>

<body>
    <nav class="navtop">
        <div>
            <h1>Website Title</h1>
            <a href="register.php"><i class="fas fa-sign-out-alt"></i>Register</a>            
            <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>

    <div class="content">
        <h2>Profile Page</h2>
        <div>
            <p>Your account details are below:</p>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><?=$_SESSION['name']?></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><?=$user->password?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?=$user->email?></td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><?=$user->firstName?></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><?=$user->lastName?></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>