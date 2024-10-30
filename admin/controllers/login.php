<?php

require_once("../models/users.php");

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

            $user = $modelUsers->loginAdmin($userData);

            if ($user == "Not an Admin")
            {
                $_SESSION['loginStatusMessage'] = "User is not an administrator";
                http_response_code(403);

                // Redirect to the account page to prevent re-submission on refresh
                header("Location: /admin/login");
                exit;
            }
            
            if ($user) {
                $_SESSION["admin_id"] = $user["id"];
                $_SESSION["admin_name"] = $user["first_name"];

                http_response_code(200);
                // Redirect admin to the overview view
                header(sprintf("Location: %s/overview/", ROOT));
            } else {
                $_SESSION['loginStatusMessage'] = "User credentials username/password are incorrect";
                http_response_code(401);

                // Redirect to the account page to prevent re-submission on refresh
                header("Location: /admin/login");
                exit;
            }
        }
    }
}