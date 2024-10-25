<?php

require_once("models/users.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim(htmlspecialchars(strip_tags($_POST["email"])));
    
    $modelUser = new Users();
    $isAvailable = $modelUser->isEmailAvailable($email);
    
    header("Content-Type: application/json");
    echo json_encode(["available" => $isAvailable]);
    exit;
}