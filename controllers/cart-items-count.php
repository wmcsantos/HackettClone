<?php

require_once("models/carts.php");

header("Content-Type: application/json");

if ( !isset($_SESSION["user_id"]) )
{
    echo json_encode([
        "success" => false,
        "message" => "User not logged in!"
    ]);
    exit;
}

$modelCarts = new Carts();
$userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);

$cartItemsCount = $modelCarts->countCartItemsFromCart($userActiveCart["id"]);

echo json_encode([
    "success" => true,
    "count" => $cartItemsCount["Total Cart Items"] ?? 0
]);
exit;