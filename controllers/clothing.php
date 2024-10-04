<?php

$pageTitle = "Men's Clothing: Shop Men's Fashion and Clothing | Hackett";

$url_parts = explode('/', $_SERVER['REQUEST_URI']);

$category = $url_parts[1];

$subcategory = str_replace('-', ' ', $url_parts[2]);

if(empty($url_parts[3])) {
    $content = "views/products.php";
} else {
    $content = "views/productdetail.php";
}