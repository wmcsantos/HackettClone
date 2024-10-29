<?php

// Page title to be displayed in the tab of the browser
$pageTitle = "Create Account | Hackett";

// View respecting the register controller
$content = "views/register.php";

require_once("models/users.php");

// Conditional statement that deals with POST requests executed in registration view
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

    // CSRF Verification
    if (!verifyCSRFToken($_POST['csrf_token'])) {
        die('CSRF token validation failed');
    }

    // Instance of the model required
    $modelUser = new Users();

    // Conditional statement to be executed when user clicks in the submit registration form button
    if ( isset($_POST["send"]) )
    {
        // Sanitize each element of the form to avoid XSS
        foreach ( $_POST as $key => $value )
        {
            $_POST[ $key ] = trim(htmlspecialchars(strip_tags($value)));
        }

        // Validations in the registration form
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
            $modelUser->isEmailAvailable($_POST["customer-email"]) &&
            $_POST["customer-password"] === $_POST["customer-confirm-password"]
        ) {
            // Create the registered user
            $user = $modelUser->createUser($userData);

            $registrationStatusMessage = "Account created succesfully. Please login";
            
            // Session variable with the registration message to indicate the user about the success of the registratration
            $_SESSION['registrationStatusMessage'] = $registrationStatusMessage;

            // Redirect newly registered user to the login area
            header(sprintf("Location: %s/login/", ROOT));
        } else
        {
            $registrationStatusMessage = "Error while creating an account. Please try again!";
            http_response_code(400);
        }
    }
}