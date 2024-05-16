<?php
// Include necessary files
include '../../Model/Student/student_enrolled_courses_model.php';
// Start session
session_start();
// Define current page
$currentPage ="enrolled_courses";

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['users_id']);
}

// Logout functionality
if (isset($_GET['logout'])) {
    // Destroy session and redirect to login page
    $_SESSION = array();
    session_destroy();
    header("Location: ../login_controller.php");
    exit;
}

// Redirect to login page if user is not logged in
if (!isLoggedIn()) {
    header("Location: ../login_controller.php");
    exit;
}

// Get user ID from query parameter
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Generate welcome message based on user ID
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Fetch user courses
$courses = fetchUserCourses($userId);

// Include the view file
include '../../View/Student/student_enrolled_courses_view.php';
?>
