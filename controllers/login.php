<?php

require_once("models/users.php");

// Page title to be displayed in the tab of the browser
$pageTitle = "My Account: Login | Hackett";

// View respecting the login controller
$content = "views/login.php";

// Instance of the model required
$modelUsers = new Users();

// Conditional statement that deals with POST requests executed in login view
if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST")
{

    // CSRF Verification
    if (!verifyCSRFToken($_POST['csrf_token'])) {
        die('CSRF token validation failed');
    }
    
    // Conditional statement to be executed when user clicks in the submit login form button
    if ( isset($_POST["send"]) ) {
        $userData = [
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        ];
        
        // Sanitize each element of the form to avoid XSS
        foreach ($_POST as $key => $value)
        {
            $_POST[$key] = trim(htmlspecialchars(strip_tags($value)));
        }
        
        // Validations in the login form
        if (
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
            mb_strlen($_POST["password"]) >= 3 &&
            mb_strlen($_POST["password"]) <= 1000
            ) {
            
            // Fetch user from the database according to the credentials passed in the form
            $user = $modelUsers->loginUser($userData);
            
            // If the user is successfully logged in, set some session variables
            if ($user) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_title"] = $user["title"];
                $_SESSION["user_name"] = $user["first_name"];

                // Redirect user to the cart view
                header(sprintf("Location: %s/cart/", ROOT));
            }
        }
    }
}