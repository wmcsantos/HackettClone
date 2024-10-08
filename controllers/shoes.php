<?php

require_once("./models/products.php");

$pageTitle = "Men's Shoes: Trainers, Boots & Formal | Hackett";

$url_parts = explode('/', $_SERVER['REQUEST_URI']);

$category = $url_parts[1];

$subcategory = str_replace('-', ' ', $url_parts[2]);

$modelProducts = new Products();
$modelCategories = new Categories();

if(empty($url_parts[3])) 
{    
    $subcategorySanitized = str_replace("-", " ", $subcategory);
    $categoryId = $modelCategories->getCategoryId($subcategorySanitized);

    $products = $modelProducts->getProductsByCategory($categoryId["id"]);

    if ( empty($products) )
    {
        $content = "views/templates/error404.php";
    } else 
    {
        $content = "views/products.php";
    }
} else 
{
    $content = "views/productdetail.php";
}