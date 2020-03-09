<!DOCTYPE html>
<html lang="en">
<title> <?=$PAGE_TITLE?> </title>

<style>

    body {
        background-image: URL(../view/images/rugby.jpg);
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover; /* Resize the background image to cover the entire container */
    }


</style>

<?php include_once "../view/includes/head.php"; ?>
<body>

<?php include_once "../view/includes/nav.php"; ?>

<div class="container cart">
    <h1>My Cart</h1>
    <?php if ( isset($_SESSION['cart']) ): ?>
        
        <h3>Current items in cart:</h3>
        <div class="row">
       
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <div class="col-sm-6" id="cartItems">
                    <?php if ($item['isHome'] === 0): ?>
                        <label for="current-single">Marauders - <?=$item['opponent']?></label>
                    <?php else: ?>
                        <label for="current-single"><?=$item['opponent']?> - Marauders</label>
                    <?php endif; ?></br>
                    
                    <?php if ($item['matchType'] == 0): ?>
                        <label for="match_type"> League Game </label>
                    <?php elseif ($item['matchType'] == 1): ?>
                        <label for="match_type"> Cup Game </label>
                    <?php elseif ($item['matchType'] == 2): ?>
                        <label for="match_type"> Friendly Game </label>
                    <?php elseif ($item['matchType'] == 3): ?>
                        <label for="match_type"> Champions League Game </label>
                    <?php endif; ?></br>

                    <?php if ($item['seatingPosition'] == 1): ?>
                        <label for="seating_position"> East Seats </label>
                    <?php elseif ($item['seatingPosition'] == 2): ?>
                        <label for="seatingPosition"> West Seats </label>
                    <?php elseif ($item['seatingPosition'] == 3): ?>
                        <label for="seatingPosition"> North Seats </label>
                    <?php elseif ($item['seatingPosition'] == 4): ?>
                        <label for="seatingPosition"> South Seats </label>
                    <?php endif; ?></br>

                    <?php if ($item['busTicketBooked'] == 'true' ): ?>
                        <label for="busTicketBooked"> Bus Ticket Booked + 10£ </label>
                    <?php endif; ?>

                    <p id="current-single"> <?=$item['quantity']?> x <?=$item['price']?> </p>
                    <hr>
                </div>

                <div class="col-sm-8"></div>
                
            <?php endforeach; ?>
        </div>

        <div>
            <div class="col-sm-8"></div>
            <div class="col-sm-3 checkout-div">
                <a href="checkout.php">
                    <button id="checkout" type="submit" value="checkout" name="add_basket" class="btn btn-success">Continue to checkout</button>
                </a>
            </div>
            
            <div class="col-sm-2 checkout-div">    
                <form method="POST">
                        <button type="submit" name="empty_cart" class="btn btn-danger">Empty My Cart</button>
                
                </form>
            </div>

        </div>  

            <div class="col-sm-3">
                <h2>Total Price: £<?=$total_price?></h2>
            </div>
   
    <?php else: ?>
        <div>YOU HAVE NOTHING IN YOUR BASKET</div>
    <?php endif; ?>
</div>

<?php include_once "../view/includes/footer.php"; ?>


</body>
</html>
