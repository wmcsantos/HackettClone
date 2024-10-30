<?php

require_once("models/carts.php");
require_once("models/cart-items.php");
require_once("models/products.php");

header('Content-Type: application/json');

// Instances of the models required
$modelCarts = new Carts();
$modelCartItems = new CartItems();
$modelProducts = new Products();

// Conditional statement that deals with POST requests to route /add-to-cart
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $csrfToken = $_SERVER['HTTP_CSRF_TOKEN'] ?? '';
    // Check the CSRF token
    if (empty($csrfToken) || $csrfToken !== $_SESSION['csrf_token']) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid CSRF token."
        ]);
        http_response_code(403);
        exit;
    }

    // Condition statement that forces the user to be logged in order to add a product variant to the cart
    if ( empty($_SESSION["user_id"]) )
    {
        echo json_encode([
            "success" => false,
            "message" => "You need to be logged in to add products to your bag!"
        ]);
        http_response_code(401);
        exit;
    }

    // Condition statement that forces the user to select the size of the product variant
    if ( empty($data["selectedSize"]) )
    {
        echo json_encode([
            "success" => false,
            "message" => "Please select a size"
        ]);
        http_response_code(400);
        exit;
    }

    // Get product variant according with the product, size and color selected
    $productVariant = $modelProducts->getProductVariant($data["productId"],$data["selectedSize"],$data["selectedColor"]) ?? null;

    // Condition statement to prevent user to select product variants that does not exist
    if ( !$productVariant )
    {
        echo json_encode([
            "success" => false,
            "message" => "Product Variant Not Found"
        ]);
        http_response_code(400);
        exit;
    }

    // Get product variant id
    $productVariantId = $productVariant["id"];

    // Get quantity of the selected product variant
    $quantity = $data["quantity"] ?? 1;

    // Get price of the selected product variant
    $productVariantPrice = $productVariant["price"] ?? 0;
    
    // Condition statement that evaluates the success of the add to cart action
    if ( $modelCarts->addToCart($_SESSION["user_id"], $productVariantId, $quantity, $productVariantPrice) )
    {
        // Get user active cart
        $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
        
        // Calculate new cart total price after adding the product to the cart
        $newCartTotalPrice = $modelCartItems->sumItemsFromCart($userActiveCart["id"]);
        
        echo json_encode([
            "success" => true,
            "message" => "Product added to cart!",
            "newTotalPrice" => $newCartTotalPrice["total_price"]
        ]);
        http_response_code(200);
        exit;
    }

    echo json_encode([
        "success" => false,
        "message" => "Error adding product to cart"
    ]);
    http_response_code(400);
    exit;
}