<?php

require_once("models/cart-items.php");
require_once("models/carts.php");

header("Content-Type: application/json");

// Conditional statement to check if user is logged in
if ( empty($_SESSION["user_id"]) ) 
{
    echo json_encode([
        "success" => false,
        "message" => "You need to be logged in to remove items from your cart."
    ]);
    exit;
}

// Conditional statement to deal with POST requests in route 'remove-from-cart'
if ( $_SERVER["REQUEST_METHOD"] === "POST" ) 
{
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);

    // Check the CSRF token
    $csrfToken = $_SERVER['HTTP_CSRF_TOKEN'] ?? '';
    if (empty($csrfToken) || $csrfToken !== $_SESSION['csrf_token']) {
        echo json_encode([
            "success" => false,
            "message" => "CSRF token validation failed."
        ]);
        http_response_code(403);
        exit;
    }

    // Conditional statement that checks if there is any cartItemId in the data that is coming from the form
    if (!isset($data["cartItemId"])) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid request."
        ]);
        exit;
    }

    // Get cart item id
    $cartItemId = $data["cartItemId"];

    // Instances of the models required
    $modelCartItems = new CartItems();
    $modelCarts = new Carts();

    // Remove the item from the cart
    if ( $modelCartItems->removeItemFromCart($cartItemId) ) {
        
        // Get user's active cart
        $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);

        // Get the new total number of items in the cart after removal
        $newCartQuantity = $modelCarts->countCartItemsFromCart($userActiveCart["id"])["total_cart_items"];

        // Get the new total price of the cart after removal
        $newCartTotalPrice = $modelCartItems->sumItemsFromCart($userActiveCart["id"]);

        echo json_encode([
            "success" => true,
            "message" => "Item removed successfully.",
            "newCartQuantity" => $newCartQuantity,
            "newTotalPrice" => $newCartTotalPrice["total_price"]
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Error removing item."
        ]);
    }
}
exit;
