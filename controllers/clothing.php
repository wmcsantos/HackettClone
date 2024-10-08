<?php

require_once("./models/products.php");

$pageTitle = "Men's Clothing: Shop Men's Fashion and Clothing | Hackett";

$url_parts = explode('/', $_SERVER['REQUEST_URI']);

$category = $url_parts[1];

$subcategory = str_replace('-', ' ', $url_parts[2]);

$modelProducts = new Products();
$modelCategories = new Categories();

if(empty($url_parts[3])) {
    $subcategorySanitized = str_replace("-", " ", $subcategory);
    $categoryId = $modelCategories->getCategoryId($subcategorySanitized);

    $products = $modelProducts->getProductsByCategory($categoryId["id"]);
    // echo "<pre>";
    // echo print_r($products);
    // echo "</pre>";
    if ( empty($products) )
    {
        $content = "views/templates/error404.php";
    } else 
    {
        $content = "views/products.php";
    }
} else {

    $color_code = $_GET['color'] ?? null;

    $productColors = $model->getProductColors($url_parts[3]);
    $productInfo = $model->getProductById($url_parts[3]);
    $productImages = $model->getProductImages($color_code, $url_parts[3]);

    $content = "views/productdetail.php";
}