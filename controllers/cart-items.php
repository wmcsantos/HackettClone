<?php

require_once("models/cart-items.php");
require_once("models/carts.php");

$modelCartItems = new CartItems();
$modelCarts = new Carts();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get user active cart
    $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
    
    // Get the updated cart items from the session or database
    $cartItems = $modelCartItems->getCartItemInCart($userActiveCart["id"]);

    echo json_encode([
        'success' => true,
        'items' => $cartItems,
    ]);
    exit;
}