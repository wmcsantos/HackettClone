<?php

require_once("models/cart-items.php");
require_once("models/carts.php");

$pageTitle = "Cart | Hackett";

$modelCartItems = new CartItems();
$modelCarts = new Carts();

if ( isset($_SESSION["user_id"]) )
{
    $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
    
    if ($userActiveCart)
    {
        $cartItems = $modelCartItems->getCartItemInCart($userActiveCart["id"]);
        
        $cartTotalPrice = $modelCartItems->sumItemsFromCart($userActiveCart["id"]);
    }
}

$content = "views/cart.php";