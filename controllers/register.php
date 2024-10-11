<?php

$pageTitle = "Create Account | Hackett";

$content = "views/register.php";

require_once("models/users.php");

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST")
{
    $userData = [
        "customer-title" => $_POST["customer-title"],
        "customer-first-name" => $_POST["customer-first-name"],
        "customer-last-name" => $_POST["customer-last-name"],
        "customer-gender" => $_POST["customer-gender"],
        "customer-email" => $_POST["customer-email"],
        "customer-password" => $_POST["customer-password"]
    ];

    $modelUser = new Users();

    if ( isset($_POST["send"]) )
    {
        // sanitize each element of the form to avoid XSS
        foreach ( $_POST as $key => $value )
        {
            $_POST[ $key ] = trim(htmlspecialchars(strip_tags($value)));
        }

        if(
            mb_strlen($_POST["customer-title"]) >= 1 &&
            mb_strlen($_POST["customer-first-name"]) >= 3 &&
            mb_strlen($_POST["customer-first-name"]) <= 100 &&
            mb_strlen($_POST["customer-last-name"]) >= 3 &&
            mb_strlen($_POST["customer-last-name"]) <= 100 &&
            mb_strlen($_POST["customer-gender"]) >= 1 &&
            mb_strlen($_POST["customer-email"]) >= 3 &&
            mb_strlen($_POST["customer-email"]) <= 252 &&
            mb_strlen($_POST["customer-password"]) >= 3 &&
            mb_strlen($_POST["customer-password"]) <= 1000 &&
            filter_var($_POST["customer-email"], FILTER_SANITIZE_EMAIL) &&
            filter_var($_POST["customer-email"], FILTER_VALIDATE_EMAIL) &&
            $_POST["customer-password"] === $_POST["customer-confirm-password"]
        ) {
            $user = $modelUser->createUser($userData);
            $registrationStatusMessage = "Account created succesfully. Please login";
            
            $_SESSION['registrationStatusMessage'] = $registrationStatusMessage;
            header(sprintf("Location: %s/login/", ROOT));
        } else
        {
            $registrationStatusMessage = "Error while creating an account. Please try again!";
            http_response_code(400);
        }
    }
}