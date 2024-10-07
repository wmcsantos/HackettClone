<?php

require_once("./models/products.php");

$pageTitle = "Men's Clothing: Shop Men's Fashion and Clothing | Hackett";

$url_parts = explode('/', $_SERVER['REQUEST_URI']);

$category = $url_parts[1];

$subcategory = str_replace('-', ' ', $url_parts[2]);

$model = new Products();

if(empty($url_parts[3])) {
    $products = $model->getProductsByCategory(1);
    // echo "<pre>";
    // echo print_r($products);
    // echo "</pre>";
    $content = "views/products.php";
} else {

    $color_code = $_GET['color'] ?? null;

    $productColors = $model->getProductColors($url_parts[3]);
    $productInfo = $model->getProductById($url_parts[3]);
    $productImages = $model->getProductImages($color_code, $url_parts[3]);

    $content = "views/productdetail.php";
}