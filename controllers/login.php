<?php

require_once("models/users.php");

$pageTitle = "My Account: Login | Hackett";

$content = "views/login.php";

$modelUsers = new Users();

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST")
{
    if ( isset($_POST["send"]) ) {
        $userData = [
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        ];
        
        foreach ($_POST as $key => $value)
        {
            $_POST[$key] = trim(htmlspecialchars(strip_tags($value)));
        }
        
        if (
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
            mb_strlen($_POST["password"]) >= 3 &&
            mb_strlen($_POST["password"]) <= 1000
            ) {

            $user = $modelUsers->loginUser($userData);
            
            if ($user) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["first_name"];
                header(sprintf("Location: %s/cart/", ROOT));
            }
        }
    }
}