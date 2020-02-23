<!DOCTYPE html>
<html lang="en">
<title>Marauders - login</title>
<style>

body {
    background-image: URL(rugby.jpg);
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
}
</style>
<?php include_once "head.php"; ?>
<body>

<?php include_once "nav.php"; ?>

<div class="container cart">
    <h1>My Cart</h1>
    <h3>Current items in cart:</h3>
    <div class="row">
        <form action="tickets.php" method="request">
        <div class="col-sm-6">
            <label for="current-single">Current single match tickets:</label>
            <p id="current-single"> 2 x 50</p>
            <hr>
            <label for="current-season">Current season tickets:</label>
            <p id="current-season"> 2 x 50</p>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4 price-col hv">
        <h2>Total Price: £200</h2>
        </div>
    </div>
    <div>
    <div class="col-sm-8"></div>
    <div class="col-sm-3 checkout-div">
        <button id="checkout" type="submit" value="checkout" onclick="wi" class="btn btn-success">Continue to checkout</button>
    </div>
    </div>
</div>

<?php include_once "footer.php"; ?>

</body>