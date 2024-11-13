<?php 
session_start();
ob_clean();

function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCSRFToken($token) {
    return isset($token) && isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

$csrfToken = generateCSRFToken();

define("ENV", parse_ini_file(".env") );

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

if (isset($_GET['page']) && $_GET['page'] === 'reset-password') {
    $content = "controllers/reset-password.php"; // Set the controller file path
    $token = $_GET['token'] ?? null; // Retrieve token for further processing if it exists
    require_once($content); // Include the reset-password controller
} else {
    // Handle other routes
    require("controllers/" . $controller . ".php");
}


// Load the layout
$content = isset($content) ? $content : "views/home.php";

if($controller !== "subcategories")
{
    require("layout.php");
}
?>