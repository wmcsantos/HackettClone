<?php

require_once("models/carts.php");

header("Content-Type: application/json");

// Check if user is logged in
if ( !isset($_SESSION["user_id"]) )
{
    echo json_encode([
        "success" => false,
        "message" => "User not logged in!"
    ]);
    http_response_code(401);
    exit;
}
// Instance of the model required
$modelCarts = new Carts();

// Get user active cart
$userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);

// Get the total counting of the cart in session
$cartItemsCount = $modelCarts->countCartItemsFromCart($userActiveCart["id"]);

echo json_encode([
    "success" => true,
    "count" => $cartItemsCount["total_cart_items"] ?? 0
]);
http_response_code(200);
exit;