<?php

$url_parts = explode('/', $_SERVER['REQUEST_URI']);

$category = $url_parts[1];

if(empty($url_parts[2])) {
    require("views/products.php");
} else {
    require("views/productdetail.php");
}