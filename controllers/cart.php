<?php

require_once("models/cart-items.php");
require_once("models/carts.php");

// Page title to be displayed in the tab of the browser
$pageTitle = "Cart | Hackett";

// Instances of the models required
$modelCartItems = new CartItems();
$modelCarts = new Carts();

// Conditional statement to check if user is logged in
if ( isset($_SESSION["user_id"]) )
{
    // Get user active cart
    $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
    
    if ($userActiveCart)
    {
        // Get cart item from user active cart
        $cartItems = $modelCartItems->getCartItemInCart($userActiveCart["id"]);
        
        // Calculate car total price
        $cartTotalPrice = $modelCartItems->sumItemsFromCart($userActiveCart["id"]);
    }
}

$content = "views/cart.php";