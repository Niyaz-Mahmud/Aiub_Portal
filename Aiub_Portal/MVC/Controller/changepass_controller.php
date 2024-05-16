<?php
// Include the model file which contains functions related to changing passwords
include '../Model/changepass_model.php';

// Initialize error and success messages
$error_message = '';
$success_message = '';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $users_id = $_POST['users_id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if any field is empty
    if (empty($users_id) || empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } else {
        // Get current password from the database
        $current_password_from_db = getCurrentPassword($mysqli, $users_id);
        
        // Check if user ID is found in the database
        if ($current_password_from_db === false) {
            $error_message = "User ID not found.";
        } 
        // Check if current password matches the one in the database
        elseif ($current_password !== $current_password_from_db) {
            $error_message = "Current password is incorrect.";
        } 
        // Check if new password matches the confirm password
        elseif ($new_password !== $confirm_password) {
            $error_message = "New password and confirm password do not match.";
        } 
        // Validate the new password format
        elseif (!isValidPassword($new_password)) {
            $error_message = "Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, one number, and one special character";
        } else {
            // Change the password in the database
            $password_changed = changePassword($mysqli, $users_id, $new_password);

            // Check if password was changed successfully
            if ($password_changed) {
                $success_message = "Password changed successfully!";
            } else {
                $error_message = "Failed to change password. Please try again.";
            }
        }
    }
}

// Function to validate password format
function isValidPassword($password) {
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/', $password);
}

// Include the view file for displaying the change password form
include '../View/changepass_view.php';
?>
