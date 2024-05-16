<?php
// Start the session
session_start();

// Include the resetpass_model.php file which contains necessary functions
require_once '../Model/resetpass_model.php';

// Redirect to login page if users_id is not set in the URL
if (!isset($_GET['users_id'])) {
    header("Location: ../login_controller.php");
    exit();
}

// Initialize error and success messages
$error_message = '';
$success_message = '';

// Retrieve users_id from the URL and convert it to an integer
$users_id = intval($_GET['users_id']);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve new password and confirm password from the form
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate if new password and confirm password fields are not empty
    if (empty($new_password) || empty($confirm_password)) {
        $error_message = "New password and confirm password fields are required.";
    } 
    // Validate if new password matches the confirm password
    elseif ($new_password !== $confirm_password) {
        $error_message = "Passwords do not match";
    } 
    // Validate the format of the new password
    elseif (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/', $new_password)) {
        $error_message = "Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, one number, and one special character";
    } else {
        // Retrieve current password from the database based on users_id
        $current_password = getPasswordById($users_id);

        // Check if the new password is not the same as the current password
        if ($current_password === $new_password) {
            $error_message = "Please enter a different password that you have not used before";
        } else {
            // Update the password in the database
            $affected_rows = updatePasswordById($users_id, $new_password);
            if ($affected_rows > 0) {
                // Set success message and redirect to login page
                $success_message = "Password updated successfully";
                $_SESSION['success_message'] = $success_message;
                unset($_SESSION['users_id']); 
                header("Location: ../Controller/login_controller.php");
                exit();
            } else {
                $error_message = "Failed to update password. No rows affected.";
            }
        }
    }
}

// Include the resetpass_view.php file to display the password reset form
include '../View/resetpass_view.php';
?>
