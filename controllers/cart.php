<?php

require_once("models/cart-items.php");
require_once("models/carts.php");

$pageTitle = "Cart | Hackett";

$modelCartItems = new CartItems();
$modelCarts = new Carts();

$userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);

$cartItems = $modelCartItems->getCartItemInCart($userActiveCart["id"]);

$content = "views/cart.php";