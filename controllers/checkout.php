<?php

require_once("models/cart-items.php");
require_once("models/carts.php");
require_once("models/users.php");
require_once("models/orders.php");
require_once("models/order-items.php");
require_once("views/templates/sending-email.php");

// Page title to be displayed in the tab of the browser
$pageTitle = "Checkout Page | Hackett";

$modelCartItems = new CartItems();
$modelCarts = new Carts();
$modelUsers = new Users();
$modelOrders = new Orders();
$modelOrderItems = new OrderItems();

// Conditional statement to check if user is logged in
if ( isset($_SESSION["user_id"]) )
{
    // Get user in session
    $user = $modelUsers->getUser($_SESSION["user_id"]);

    // Get user's active cart
    $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
    
    if ( $userActiveCart )
    {
        // Get cart item in cart
        $cartItems = $modelCartItems->getCartItemInCart($userActiveCart["id"]);
        
        // Get cart items to be inserted into the order items database table
        $cartItemToInsertInOrderItems = $modelCartItems->getCartItemsInCart($userActiveCart["id"]);
        
        // Calculate cart's total price
        $cartTotalPrice = $modelCartItems->sumItemsFromCart($userActiveCart["id"]);
    }
    
    $content = "views/checkout.php";

    // Conditional statement to deal with POST requests in the checkout view
    if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST")
    {
        $userData = [
            "customer-address" => $_POST["customer-address"],
            "customer-first-name" => $_POST["customer-first-name"],
            "customer-last-name" => $_POST["customer-last-name"],
            "customer-country" => $_POST["customer-country"],
            "customer-city" => $_POST["customer-city"],
            "customer-zip" => $_POST["customer-zip"]
        ];

        // CSRF Verification
        if (!verifyCSRFToken($_POST['csrf_token'])) {
            die('CSRF token validation failed');
        }

        // Conditional statement to be executed when user clicks in the submit checkout form button
        if ( isset($_POST["send"]) )
        {
            // sanitize each element of the form to avoid XSS
            foreach ( $_POST as $key => $value )
            {
                $_POST[ $key ] = trim(htmlspecialchars(strip_tags($value)));
            }

            if(
                mb_strlen($_POST["customer-address"]) >= 3 &&
                mb_strlen($_POST["customer-address"]) <= 200 &&
                mb_strlen($_POST["customer-country"]) >= 1 &&
                mb_strlen($_POST["customer-city"]) >= 3 &&
                mb_strlen($_POST["customer-city"]) <= 50 &&
                mb_strlen($_POST["customer-zip"]) >= 3 &&
                mb_strlen($_POST["customer-zip"]) <= 10
            ) {

                // Concatenate form fields to set the shipping address
                $shipping_address = $_POST["customer-address"] . "," . $_POST["customer-city"] . "," . $_POST["customer-zip"];
                
                // Create order in the orders table
                $orderId = $modelOrders->createOrder($_SESSION["user_id"], "paid", $cartTotalPrice["total_price"], $shipping_address);

                // Insert items in the order_items table
                foreach ($cartItemToInsertInOrderItems as $item) {
                    $orderItems = $modelOrderItems->createOrderItem($orderId, $item["product_variant_id"], $item["quantity"], $item["price"]);
                }

                // Delete cart items once the products are stored in the order_items table
                $modelCartItems->deleteCartItemsFromCart($userActiveCart["id"]);

                // Update cart_status to inactive
                $modelCarts->updateCartStatus($userActiveCart["id"]);
                
                $orderStatusMessage = "Payment Accepted. Order is being processed. You will receive an email with the details of the order";
                
                // Session variable with the order status message 
                $_SESSION['orderStatusMessage'] = $orderStatusMessage;

                header(sprintf("Location: %s/orders", ROOT));

                // Send an orer confirmation to the user by email
                sendOrderConfirmation($_POST["customer-email"], $_POST["customer-first-name"], $cartItems, $cartTotalPrice);
            } else
            {
                $orderStatusMessage = "Error while processing the order. Please try again!";
                http_response_code(400);
            }
        }
    }
} else {
    // Redirect to login page if the user is not logged in
    header("Location: /login");
}
