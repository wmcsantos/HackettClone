<?php

require_once("models/users.php");
require_once("models/password-resets.php");

// Page title to be displayed in the tab of the browser
$pageTitle = "Reset Password | Hackett";


if (isset($_GET['token'])) {
    
    $passwordResetModel = new PasswordResets();
    
    $token = $_GET['token'];
    
    // Check if the token is valid and not expired
    $tokenValidity = $passwordResetModel->checkTokenValidity($token);
    
    if ($tokenValidity) {
        // Token is valid
        $_SESSION['reset_user_id'] = $tokenValidity['user_id'];
    } else {
        die("Invalid or expired token.");
    }
} else {
    die("Invalid request.");
}

// View respecting the productdetail controller
$content = "views/reset-password.php";
