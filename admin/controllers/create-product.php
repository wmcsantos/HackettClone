<?php

require_once("../models/colors.php");
require_once("../models/categories.php");

$pageTitle = "Insert Product | Hackett";

$content = "views/create-product.php";

$modelColors = new Colors();
$modelCategories = new Categories();


$colors = $modelColors->getColors();
$categories = $modelCategories->getCategories();
$subcategories = $modelCategories->getAllSubcategories();