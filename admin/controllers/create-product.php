<?php

require_once("../models/colors.php");
require_once("../models/categories.php");

$modelColors = new Colors();
$modelCategories = new Categories();


$colors = $modelColors->getColors();
$categories = $modelCategories->getCategories();
$subcategories = $modelCategories->getAllSubcategories();

require("views/create-product.php");