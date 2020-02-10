<!DOCTYPE html>
<html lang="en">
<title>Marauders - Order</title>
<style>

body {
    background-image: URL(seats.jpg);
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
}
</style>

<?php include_once "head.php"; ?>

<body>
<?php include_once "nav.php"; ?>

<div class="container order">
    <h1>Ticket Ordering</h1>
    <div class="flex-container">
        <div>
        <h3>Single Ticket Purchase:</h3>
        </div>
        <div style="flex-basis:600px" class="form">
        <form class="form-inline" method="post" action="tickets.php" id="main">
            <label class="space" for="single-qty">Quantity:</label>
            <select class="form-control space" id="single-qty">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option> 
                <option value="5">5</option>
            </select>
            <label class="space" for="single-ticket">Stadium Postion:</label>
            <select class="form-control space" id="single-ticket">
                <option value="A1">A1</option>
                <option value="B2">B2</option>
                <option value="C3">C3</option>
                <option value="D4">D4</option> 
                <option value="E5">E5</option>
            </select>
            <label class="space" for="price">Price:</label>
            <p id="price">£50</p>
        </form>
        </div>
            <div>
            <button type="button" class="btn-success" value="Add to Cart" id="submit">Add to cart! 
            <span class="glyphicon glyphicon-shopping-cart" id="cart"></span></button>
            </div>
    </div>
    <hr>
    <div class="flex-container">
        <div>
        <h3>Season Ticket Purchase:</h3>
        </div>
        <div style="flex-basis:600px" class="form">
        <form class="form-inline" method="post" action="tickets.php" id="main">
            <label class="space" for="single-qty">Quantity:</label>
            <select class="form-control space" id="single-qty">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option> 
                <option value="5">5</option>
            </select>
            <label class="space" for="single-ticket">Stadium Postion:</label>
            <select class="form-control space" id="single-ticket">
                <option value="A1">A1</option>
                <option value="B2">B2</option>
                <option value="C3">C3</option>
                <option value="D4">D4</option> 
                <option value="E5">E5</option>
            </select>
            <label class="space" for="price">Price:</label>
            <p id="price">£50</p>
        </form>
        </div>
        <div>
            <button type="button" class="btn-success" value="Add to Cart" id="submit">Add to cart! 
            <span class="glyphicon glyphicon-shopping-cart" id="cart"></span></button>
            </div>
    </div>
</div>


<?php include_once "footer.php"; ?>
</body>