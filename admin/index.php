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

define("ENV", parse_ini_file("../.env") );

define("ROOT", "/admin");

$url_parts = explode('/', $_SERVER['REQUEST_URI']); //super variavel PHP tem 6 ($_POST, $_GET, ...)

$controller = $url_parts[2];

if(empty($controller)) {
    $controller = "overview";
}

if(!empty($url_parts[3])) {
    $id = $url_parts[3];
}

// var_dump($controller);

require("controllers/" . $controller . ".php");

?>