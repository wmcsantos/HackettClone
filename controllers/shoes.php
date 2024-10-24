<?php

require_once("./models/products.php");
require_once("models/product-variants.php");
require_once("models/cart-items.php");
require_once("models/carts.php");

// Page title to be displayed in the tab of the browser
$pageTitle = "Men's Shoes: Trainers, Boots & Formal | Hackett";

// URL parts to parse the category and subcategory
$url_parts = explode('/', $_SERVER['REQUEST_URI']);

$category = $url_parts[1];

$subcategory = str_replace('-', ' ', $url_parts[2]);

// Instances of the models required
$modelProducts = new Products();
$modelProductVariants = new ProductVariants();
$modelCategories = new Categories();

if(empty($url_parts[3])) // In case the URL does not have the id of the product
{    
    $subcategorySanitized = str_replace("-", " ", $subcategory);
    $categoryId = $modelCategories->getCategoryId($subcategorySanitized);

    $products = $modelProducts->getProductsByCategory($categoryId["id"]);

    $content = "views/products.php";
} else // In case the URL has the id of the product
{

    $color_code = $_GET['color'] ?? null;

    $productColors = $modelProducts->getProductColors($url_parts[3]);
    $productInfo = $modelProducts->getProductById($url_parts[3]);
    $productImages = $modelProducts->getProductImages($color_code, $url_parts[3]);
    $productSizes = $modelProductVariants->getProductSizesStock($productImages[0]["id"]);

    // Instances of the models required
    $modelCartItems = new CartItems();
    $modelCarts = new Carts();

    if (isset($_SESSION["user_id"]))
    {   
        $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
        
        if ($userActiveCart)
        {
            $cartItems = $modelCartItems->getCartItemInCart($userActiveCart["id"]);
        }
    }

    $content = "views/productdetail.php";
}