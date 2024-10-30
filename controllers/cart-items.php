<?php

require_once("models/cart-items.php");
require_once("models/carts.php");

// Instances of the models required
$modelCartItems = new CartItems();
$modelCarts = new Carts();

// Conditional statement that deals with GET requests to route 'cart-items'
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // Get user active cart
    $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
    
    // Get the updated cart items from the session or database
    $cartItems = $modelCartItems->getCartItemInCart($userActiveCart["id"]);

    echo json_encode([
        'success' => true,
        'items' => $cartItems,
    ]);
    http_response_code(200);
    exit;
}