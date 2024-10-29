<?php

require_once("models/users.php");

// Conditional statement to deal with POST requests in the registration view
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // CSRF Verification
    if (!verifyCSRFToken($_POST['csrf_token'])) {
        die('CSRF token validation failed');
    }

    // sanitize each element of the form to avoid XSS
    $email = trim(htmlspecialchars(strip_tags($_POST["email"])));
    
    // Instance of the model required
    $modelUser = new Users();
    
    // Boolean variable to indicate if email is already in use
    $isAvailable = $modelUser->isEmailAvailable($email);
    
    header("Content-Type: application/json");
    echo json_encode(["available" => $isAvailable]);
    exit;
}