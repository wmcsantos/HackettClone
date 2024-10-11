<?php

require_once("models/users.php");

$pageTitle = "My Account | Hackett";

$content = "views/account.php";

$modelUsers = new Users();

$user = $modelUsers->getUser($_SESSION["user_id"]);

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST")
{
    if ( isset($_POST["send"]) )
    {
        $userData = [
            "title" => $_POST["customer-title"],
            "first_name" => $_POST["customer-first-name"],
            "last_name" => $_POST["customer-last-name"],
            "gender" => $_POST["customer-gender"],
            "email" => $_POST["customer-email"],
        ];
    
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
            filter_var($_POST["customer-email"], FILTER_SANITIZE_EMAIL) &&
            filter_var($_POST["customer-email"], FILTER_VALIDATE_EMAIL)
        ) {
            $user = $modelUsers->updateUser($userData, $_SESSION["user_id"]);
            $updateStatusMessage = "Account details updated succesfully.";
            
            $_SESSION['updateStatusMessage'] = $updateStatusMessage;
        } else
        {
            $updateStatusMessage = "Error while updating the account. Please try again!";
            http_response_code(400);
        }
    }

    if ( isset($_POST["send-set-password"]) )
    {
        print_r($_POST);
        $userData = [
            "current_password" => $_POST["current-password"],
            "new_password" => $_POST["new-password"],
            "confirm_new_password" => $_POST["confirm-new-password"],
        ];

        // sanitize each element of the form to avoid XSS
        foreach ( $_POST as $key => $value )
        {
            $_POST[ $key ] = trim(htmlspecialchars(strip_tags($value)));
        }

        if(
            mb_strlen($_POST["current-password"]) >= 3 &&
            mb_strlen($_POST["current-password"]) <= 1000 &&
            password_verify($_POST["current-password"], $user["password_hash"]) &&
            mb_strlen($_POST["new-password"]) >= 3 &&
            mb_strlen($_POST["new-password"]) <= 1000 &&
            mb_strlen($_POST["confirm-new-password"]) >= 3 &&
            mb_strlen($_POST["confirm-new-password"]) <= 1000 &&
            $_POST["confirm-new-password"] === $_POST["new-password"]
        ) {
            $user = $modelUsers->updateUserPassword($userData, $_SESSION["user_id"]);
            $updateStatusMessage = "Account details updated succesfully.";
            
            $_SESSION['updateStatusMessage'] = $updateStatusMessage;
        } else
        {
            $updateStatusMessage = "Error while updating the account. Please try again!";
            http_response_code(400);
        }
    }
}