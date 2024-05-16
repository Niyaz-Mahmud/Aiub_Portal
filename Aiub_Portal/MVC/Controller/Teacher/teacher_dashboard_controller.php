<?php

// Start the session
session_start();

// Include necessary file
include '../../Model/Teacher/teacher_dashboard_model.php';

// Set current page
$currentPage = "teacher_dashboard";

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['users_id']);
}

// Logout functionality
if (isset($_GET['logout'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: ../login_controller.php");
    exit;
}

// Redirect if user is not logged in
if (!isLoggedIn()) {
    header("Location: ../login_controller.php");
    exit;
}

// Get user ID if available
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Fetch user courses
$courses = fetchUserCourses($userId);

// Include teacher dashboard view
include '../../View/Teacher/teacher_dashboard_view.php';
?>
