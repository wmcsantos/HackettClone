<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackett London</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
</body>
</html>
<?php 
session_start();

define("ENV", parse_ini_file(".env") );

require("./models/categories.php");

$model = new Categories();

$categories = $model->getCategories();

define("ROOT", "");

$url_parts = explode('/', $_SERVER['REQUEST_URI']); //super variavel PHP tem 6 ($_POST, $_GET, ...)

$controller = $url_parts[1] !== 'view-all' ? $url_parts[1] : $url_parts[2];

if(empty($controller)) {
    $controller = "home";
}

// var_dump($controller);

require("controllers/" . $controller . ".php");

?>