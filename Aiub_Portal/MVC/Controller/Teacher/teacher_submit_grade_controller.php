<?php

// Start the session
session_start();

// Include necessary file
include '../../Model/Teacher/teacher_submit_grade_model.php';

// Set current page
$currentPage = "teacher_submit_grade";

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

// Fetch semesters from database
$semesters = fetchSemestersFromDatabase($userId);

// Get selected semester from GET parameters
$selectedSemester = isset($_GET['semester']) ? $_GET['semester'] : null;

// Fetch courses for the selected semester
$courses = fetchCoursesFromDatabase($userId, $selectedSemester);

// Include teacher submit grade view
include '../../View/Teacher/teacher_submit_grade_view.php';
?>
