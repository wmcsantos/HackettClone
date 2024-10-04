<?php 
session_start();

define("ENV", parse_ini_file(".env") );

if (ENV === false) {
    die("Failed to load .env");
}

require_once("./models/categories.php");

$model = new Categories();

$categories = $model->getCategories();

define("ROOT", "");

$url_parts = explode('/', $_SERVER['REQUEST_URI']); //super variavel PHP tem 6 ($_POST, $_GET, ...)

$controller = $url_parts[1] !== 'view-all' ? $url_parts[1] : $url_parts[2];

if(empty($controller)) 
{
    $controller = "home";
}

require("controllers/" . $controller . ".php");

// Load the layout
$content = isset($content) ? $content : "views/home.php";

if($controller !== "subcategories")
{
    require("layout.php");
}
?>