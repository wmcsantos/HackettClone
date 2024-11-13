<?php

require_once("models/users.php");
require_once("models/password-resets.php");
require_once("views/templates/sending-email.php");

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    $userModel = new Users();
    $passwordResetModel = new PasswordResets();

    $user = $userModel->getUserByEmail($email);

    if ($user)
    {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        $userId = $user["id"];
        $expiration = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token valid for 1 hour
        // Store token in the database
        $passwordResetModel->saveToken($userId, $token, $expiration);
        // Create a reset link
        $resetLink = "http://localhost:8888/index.php?page=reset-password&token=" . urlencode($token);
        // Send reset link to user's email
        sendPasswordResetEmail($email, "User", $resetLink);
    } else {
        $_SESSION['message'] = "If the email exists in our system, a reset link has been sent.";
    }
    exit;
}