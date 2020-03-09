<!DOCTYPE html>
<html lang="en">
<title> <?=$PAGE_TITLE?> </title>

<?php include_once "../view/includes/head.php"; ?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../view/static/styles_checkout.css">
</head>
<body>

<?php include_once "../view/includes/nav.php"; ?>

<div class="row">
  <div class="col-75">
    <div class="container white-body">
      
      <form method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="John M. Doe">
            
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="name_on_card" placeholder="John More Doe">
            
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input name="buy_ticket" type="submit" value="Submit" class="btn">
      </form>

    </div>
  </div>
  <div class="col-25">
    <div class="container ">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b> <?=$total_items?> </b></span></h4>
      </br>
      <?php foreach ($_SESSION['cart'] as $item): ?>
        <?php if ($item['isHome'] === 0): ?>
          <p>Marauders - <?=$item['opponent']?> x <?=$item['quantity']?> <span class="price"><?=$item['price']?></span> </p>
        <?php else: ?>
          <p><?=$item['opponent']?> - Marauders x <?=$item['quantity']?> <span class="price"><?=$item['price']?></span> </p>
        <?php endif; ?></br>
        
      <?php endforeach; ?>
      
      <hr>
      <p>Total <span class="price" style="color:black"><b> <?=$total_price?> </b></span></p>
    </div>
  </div>
</div>

<?php include_once "../view/includes/footer.php"; ?>
</body>