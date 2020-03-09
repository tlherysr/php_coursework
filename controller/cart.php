<?php

session_start();
require_once '../model/dataAccess.php';

// main controller

if ( isset($_SESSION['cart']) ) {
    $total_price = 0;
    foreach ($_SESSION['cart'] as $i) {
        $total_price += $i['price'] * $i['quantity']; 
        $total_price = $i['busTicketBooked'] == 'true' ? $total_price+10 : $total_price;  
    } 
}

if ( isset($_POST['empty_cart']) ) {
    $_SESSION['cart'] = array();
    header('Location: cart.php');
    exit;
}

require_once "../view/includes/a_config.php";
require_once "../view/main/cart_view.php";

?>