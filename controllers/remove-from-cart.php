<?php

require_once("models/cart-items.php");
require_once("models/carts.php");

header("Content-Type: application/json");

if ( empty($_SESSION["user_id"]) ) 
{
    echo json_encode([
        "success" => false,
        "message" => "You need to be logged in to remove items from your cart."
    ]);
    exit;
}

if ( $_SERVER["REQUEST_METHOD"] === "POST" ) 
{
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);

    if (!isset($data["cartItemId"])) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid request."
        ]);
        exit;
    }

    $cartItemId = $data["cartItemId"];
    $modelCartItems = new CartItems();
    $modelCarts = new Carts();

    // Remove the item from the cart
    if ( $modelCartItems->removeItemFromCart($cartItemId) ) {
        // Get the new total number of items in the cart after removal
        $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
        $newCartQuantity = $modelCarts->countCartItemsFromCart($userActiveCart["id"])["total_cart_items"];

        echo json_encode([
            "success" => true,
            "message" => "Item removed successfully.",
            "newCartQuantity" => $newCartQuantity
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Error removing item."
        ]);
    }
}
exit;
