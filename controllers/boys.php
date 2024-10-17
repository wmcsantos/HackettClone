<?php

require_once("./models/products.php");
require_once("models/cart-items.php");
require_once("models/carts.php");

$pageTitle = "Boy's Clothing, Footwear & Accesories | Hackett";

$url_parts = explode('/', $_SERVER['REQUEST_URI']);

$category = $url_parts[1];

$subcategory = str_replace('-', ' ', $url_parts[2]);

$modelProducts = new Products();
$modelCategories = new Categories();

if(empty($url_parts[3])) {
    $subcategorySanitized = str_replace("-", " ", $subcategory);
    $categoryId = $modelCategories->getCategoryId($subcategorySanitized);

    $products = $modelProducts->getProductsByCategory($categoryId["id"]);

    $content = "views/products.php";
    
} else {

    $modelCartItems = new CartItems();
    $modelCarts = new Carts();

    $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);

    $cartItems = $modelCartItems->getCartItemInCart($userActiveCart["id"]);

    $content = "views/productdetail.php";
}