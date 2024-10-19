<?php

require_once("models/cart-items.php");
require_once("models/carts.php");

// Page title to be displayed in the tab of the browser
$pageTitle = "Checkout Page | Hackett";

$modelCartItems = new CartItems();
$modelCarts = new Carts();

if ( isset($_SESSION["user_id"]) )
{
    $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
    
    $cartItems = $modelCartItems->getCartItemInCart($userActiveCart["id"]);

    $cartTotalPrice = $modelCartItems->sumItemsFromCart($userActiveCart["id"]);
}

$content = "views/checkout.php";