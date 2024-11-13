<?php

require_once("models/users.php");
require_once("models/password-resets.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['reset_user_id'])) {

    $modelUsers = new Users();
    $passwordResetModel = new PasswordResets();

    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];
    $userId = $_SESSION['reset_user_id'];

    if ($newPassword === $confirmPassword && mb_strlen($newPassword) >= 3 && mb_strlen($confirmPassword) >= 3) {

        // Update password in users table
        $userPassword = $modelUsers->updateUserPassword(["new_password" => $newPassword], $userId);

        // Remove the used token
        $passwordResetModel->deleteUsedToken($userId);

        // Destroy session reset data and redirect to login
        unset($_SESSION['reset_user_id']);
        $_SESSION['loginStatusMessage'] = "Password reset successfully. Please log in.";
        header("Location: login");
    } else {
        $_SESSION['error'] = "Passwords do not match.";
        header(sprintf("Location: http://localhost:8888/index.php?page=reset-password&token=%s", urlencode($_POST['token'])));
    }
} else {
    die("Unauthorized request.");
}