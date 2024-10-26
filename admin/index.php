<?php 
session_start();

define("ENV", parse_ini_file("../.env") );

define("ROOT", "/admin");

$url_parts = explode('/', $_SERVER['REQUEST_URI']); //super variavel PHP tem 6 ($_POST, $_GET, ...)

$controller = $url_parts[2];

if(empty($controller)) {
    $controller = "login";
}

if(!empty($url_parts[3])) {
    $id = $url_parts[3];
}

// Check if the user is logged in for routes other than login
if ($controller !== "login" && empty($_SESSION["admin_id"]))
{
    // Redirect to login page if the user is not logged in
    header("Location: /admin/login");
    exit();
}

require("controllers/" . $controller . ".php");

// Load the layout
$content = isset($content) ? $content : "views/overview.php";

if($controller !== "subcategories")
{
    require("layout.php");
}

?>