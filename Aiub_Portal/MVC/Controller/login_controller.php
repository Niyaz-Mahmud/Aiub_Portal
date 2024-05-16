<?php
// Start the session
session_start();

// Include the login_model.php file which contains necessary functions
require_once('../Model/login_model.php');

// Retrieve users_id from cookie if set
$users_id_cookie = isset($_COOKIE['users_id']) ? $_COOKIE['users_id'] : '';
$error_message = '';
$success_message = '';

// Check if the user is already logged in
if(isset($_SESSION['users_id'])) {
    // Determine the redirect URL based on user role
    $redirect_url = determineRedirectURL($_SESSION['user_role'], $_SESSION['users_id']);
    // Redirect the user to the appropriate dashboard
    header("Location: http://localhost/aiub_portal/$redirect_url");
    exit();
}

// Check if the login form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['users_id']) && isset($_POST['password'])) {
        $users_id = $_POST['users_id'];
        $password = $_POST['password'];

        // Retrieve user data from the database
        $user = getUser($users_id);

        // Check if user exists and password matches
        if ($user && $password === $user['password']) {
            // Set session variables for user ID and role
            $_SESSION['users_id'] = $user['users_id'];
            $_SESSION['user_role'] = $user['role'];

            // Set cookie for user ID
            setcookie('users_id', $user['users_id'], time() + (86400 * 30), "/");

            // Determine the redirect URL based on user role
            $redirect_url = determineRedirectURL($user['role'], $user['users_id']);
            // Redirect the user to the appropriate dashboard
            header("Location: http://localhost/Aiub_portal/$redirect_url");
            exit();
        } else {
            $error_message = "Invalid User ID or Password. Please try again.";
        }
    }
}

// Function to determine the redirect URL based on user role
function determineRedirectURL($role, $users_id) {
    switch ($role) {
        case "Registrar":
            return 'MVC/Controller/Registrar/registrar_dashboard_controller.php?users_id=' . $users_id;
        case "Student":
            return 'MVC/Controller/student/student_dashboard_controller.php?users_id=' . $users_id;
        case "Teacher":
            return 'MVC/Controller/teacher/teacher_dashboard_controller.php?users_id=' . $users_id;
        case "HR":
            return 'MVC/Controller/HR/hr_dashboard_controller.php?users_id=' . $users_id;
        default:
            return 'Wrong_dashboard.php?users_id=' . $users_id;
    }
}

// Include the login_view.php file to display the login form
include('../View/login_view.php');
?>
