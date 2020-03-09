<?php

session_start();
require_once '../model/dataAccess.php';

if ( isset($_SESSION['cart']) ) {
    $total_items = 0;
    $total_price = 0;
    foreach ($_SESSION['cart'] as $i) {
        $total_items +=  $i['quantity'];
        $total_price += $i['quantity'] * $i['price'];
    } 
}


if ( isset($_POST['buy_ticket']) ) {
    $fullname     = !empty($_POST['fullname']) ? trim($_POST['fullname']) : null;
    $email        = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $address      = !empty($_POST['address']) ? trim($_POST['address']) : null;
    $city         = !empty($_POST['city']) ? trim($_POST['city']) : null;
    $state        = !empty($_POST['state']) ? trim($_POST['state']) : null;
    $zip          = !empty($_POST['zip']) ? trim($_POST['zip']) : null;
    $name_on_card = !empty($_POST['name_on_card']) ? trim($_POST['name_on_card']) : null;
    $cardnumber   = !empty($_POST['cardnumber']) ? trim($_POST['cardnumber']) : null;
    $expmonth     = !empty($_POST['expmonth']) ? trim($_POST['expmonth']) : null;
    $expyear      = !empty($_POST['expyear']) ? trim($_POST['expyear']) : null;
    $cvv          = !empty($_POST['cvv']) ? trim($_POST['cvv']) : null;

    $new_order = new Orders();
    $new_order->fullName    = $fullname;
    $new_order->email       = $email;
    $new_order->address     = $address;
    $new_order->city        = $city;
    $new_order->state       = $state;
    $new_order->zip         = $zip;
    $new_order->nameOnCard  = $name_on_card;
    $new_order->creditCardNumber = $cardnumber;
    $new_order->expiryMonth = $expmonth;
    $new_order->expiryYear  = $expyear;
    $new_order->cvv         = $cvv;
    $new_order->totalCost   = $total_price;

    $result = insert_order_and_tickets($new_order, $_SESSION['cart']);

    // If the order process is successful.
    if ( $result ) {
        die('Your order details have been saved.');
        unset($_SESSION['cart']);
    }
    else {
        die('something wrong!!');
    }

}

require_once '../view/includes/a_config.php';
require_once '../view/main/checkout_view.php';

?>