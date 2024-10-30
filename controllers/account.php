<?php

require_once("models/users.php");

// Page title to be displayed in the tab of the browser
$pageTitle = "My Account | Hackett";

if (empty($_SESSION["user_id"]))
{
    // Redirect to login page if the user is not logged in
    header("Location: /login");
}

// View respecting the account controller
$content = "views/account.php";

// Instance of the model required
$modelUsers = new Users();

// Get logged in user
$user = $modelUsers->getUser($_SESSION["user_id"]);

// Conditional statement that deals with POST requests executed in account view
if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST")
{
    // CSRF Verification
    if (!verifyCSRFToken($_POST['csrf_token'])) {
        die('CSRF token validation failed');
    }

    // Conditional statement to deal with the first form in the view to update user's information
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

        // Validations for each field of the form
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
            // Update user's information
            $user = $modelUsers->updateUser($userData, $_SESSION["user_id"]);
            $updateStatusMessage = "Account details updated succesfully.";
            
            // Session variable to inform user about the success of the update
            $_SESSION['updateStatusMessage'] = $updateStatusMessage;
            http_response_code(200);

            // Redirect to the account page to prevent re-submission on refresh
            header("Location: /account");
            exit;
        } else
        {
            $updateStatusMessage = "Error while updating the account. Please try again!";
            http_response_code(400);

            // Redirect to the account page to prevent re-submission on refresh
            header("Location: /account");
            exit;
        }
    }

    // Conditional statement to deal with the second form in the view to change user's password
    if ( isset($_POST["send-set-password"]) )
    {
        $userData = [
            "current_password" => $_POST["current-password"],
            "new_password" => $_POST["new-password"],
            "confirm_new_password" => $_POST["confirm-new-password"],
        ];

        // CSRF Verification
        if (!verifyCSRFToken($_POST['csrf_token'])) {
            die('CSRF token validation failed');
        }

        // sanitize each element of the form to avoid XSS
        foreach ( $_POST as $key => $value )
        {
            $_POST[ $key ] = trim(htmlspecialchars(strip_tags($value)));
        }

        // Validations for each field of the form
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
            // Update user's password
            $userPassword = $modelUsers->updateUserPassword($userData, $_SESSION["user_id"]);
            $updateStatusMessage = "Account details updated succesfully.";
            
            // Session variable to inform user about the success of the update
            $_SESSION['updateStatusMessage'] = $updateStatusMessage;
            http_response_code(200);

            // Redirect to the account page to prevent re-submission on refresh
            header("Location: /account");
            exit;
        } else
        {
            $updateStatusMessage = "Error while updating the account. Please try again!";
            $_SESSION['updateStatusMessage'] = $updateStatusMessage;
            http_response_code(400);

            // Redirect to the account page to prevent re-submission on refresh
            header("Location: /account");
            exit;
        }
    }
}