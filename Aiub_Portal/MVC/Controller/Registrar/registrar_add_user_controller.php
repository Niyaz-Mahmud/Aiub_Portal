<?php

// Include necessary files
include '../../Model/Registrar/registrar_add_user_model.php';
session_start();

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['users_id']);
}

// Logout functionality
if (isset($_GET['logout'])) {
    // Clear session data
    $_SESSION = array();
    session_destroy();
    
    // Redirect to login page
    header("Location: ../login_controller.php");
    exit;
}

// Redirect to login if user is not logged in
if (!isLoggedIn()) {
    header("Location: ../login_controller.php");
    exit;
}

// Generate new user ID
$newUserId = generateNewUserId();

// Get user ID from session
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Error message initialization
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Collect form data
        $user_id = $newUserId; 
        $role = $_POST['role'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        // Validate form data
        if (!empty($role) && !empty($password) && !empty($phone) && !empty($email)) {
            // Sanitize inputs
            $role = htmlspecialchars($role);
            $password = htmlspecialchars($password);
            $phone = htmlspecialchars($phone);
            $email = htmlspecialchars($email);

            // Insert user into database
            $error_message = insertUserIntoDatabase($userId, $role, $password, $phone, $email, $user_id);
            if (empty($error_message)) {
                // Redirect based on user role
                switch ($role) {
                    case 'Student':
                        header("Location: registrar_add_student_details_controller.php?users_id=$userId&user_id=$user_id&email=$email&phone=$phone");
                        exit;
                    case 'Teacher':
                        header("Location: registrar_add_teacher_details_controller.php?users_id=$userId&user_id=$user_id&email=$email&phone=$phone");
                        exit;
                    case 'HR':
                        header("Location: registrar_add_HR_details_controller.php?users_id=$userId&user_id=$user_id&email=$email&phone=$phone");
                        exit;
                    case 'Registrar':
                        header("Location: registrar_add_registar_details_controller.php?users_id=$userId&user_id=$user_id&email=$email&phone=$phone");
                        exit;
                    default:
                        break;
                }
            }
        } else {
            $error_message = "Please fill in all the fields.";
        }
    }
}

// Include view file
include '../../View/Registrar/registrar_add_user_view.php';
?>
