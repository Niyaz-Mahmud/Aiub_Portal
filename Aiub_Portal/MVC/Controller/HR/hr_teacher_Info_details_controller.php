<?php

// Start the session
session_start();

// Include necessary file
require_once '../../Model/HR/hr_teacher_Info_details_model.php';

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

// Set current page
$currentPage = "hr_teacher_info"; 

// Initialize teachers array
$teachers = array();

// Check if teacher ID is provided
if (isset($_GET['teacher_id'])) {
    $teacherId = $_GET['teacher_id'];
    
    // Fetch teacher details
    $teachers = fetchTeacherDetails($teacherId);
}

// Get user ID if available
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Include HR teacher info details view
include '../../View/HR/hr_teacher_Info_details_views.php';
?>
