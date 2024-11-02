<?php

require_once("models/orders.php");

// Page title to be displayed in the tab of the browser
$pageTitle = "My Account: Order History | Hackett";

$modelOrders = new Orders();

if (empty($_SESSION["user_id"]))
{
    // Redirect to login page if the user is not logged in
    header("Location: /login");
}

$orders = $modelOrders->getOrdersByUser($_SESSION["user_id"]);

// View respecting the orders controller
$content = "views/orders.php";