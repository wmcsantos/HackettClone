<?php

require_once("models/carts.php");
require_once("models/products.php");

header('Content-Type: application/json');  // Set the correct content type

$modelCarts = new Carts();
$modelProducts = new Products();

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if ( empty($_SESSION["user_id"]) )
    {
        echo json_encode([
            "success" => false,
            "message" => "You need to be logged in to add products to your bag!"
        ]);
        exit;
    }

    if ( empty($data["selectedSize"]) )
    {
        echo json_encode([
            "success" => false,
            "message" => "Please select a size"
        ]);
        exit;
    }

    $productVariant = $modelProducts->getProductVariant($data["productId"],$data["selectedSize"],$data["selectedColor"]) ?? null;

    if ( !$productVariant )
    {
        echo json_encode([
            "success" => false,
            "message" => "Product Variant Not Found"
        ]);
        exit;
    }

    $productVariantId = $productVariant["id"];

    $quantity = $data["quantity"] ?? 1;
    $productVariantPrice = $productVariant["price"] ?? 0;

    if ( $modelCarts->addToCart($_SESSION["user_id"], $productVariantId, $quantity, $productVariantPrice) )
    {
        echo json_encode([
            "success" => true,
            "message" => "Product added to cart!"
        ]);
        exit;
    }

    echo json_encode([
        "success" => false,
        "message" => "Error adding product to cart"
    ]);
    exit;
}