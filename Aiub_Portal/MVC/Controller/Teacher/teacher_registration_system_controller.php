<?php

// Start the session
session_start();

// Include necessary file
include '../../Model/Teacher/teacher_registration_system_model.php';

// Set current page
$currentPage = "teacher_registration_system";

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

// Enrollment process if POST request is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['courses']) && isset($_POST['semester'])) {
    $enrolledCourses = $_POST['courses'];
    $semester = $_POST['semester'];
    $message = enrollCourses($userId, $enrolledCourses, $semester);
}

// Set results per page
$results_per_page  = 10;

// Determine the current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($page - 1) * $results_per_page ;

// Function to calculate total pages
function getTotalPages($results_per_page ) {
    $totalRecords = getTotalRecords(); 
    $totalPages = ceil($totalRecords / $results_per_page );
    return $totalPages;
}

// Check if search term is provided
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $availableCourses = searchAvailableCourses($userId, $searchTerm, $startFrom, $results_per_page );
} else {
    $availableCourses = fetchAvailableCourses($userId, $startFrom, $results_per_page );
}

// Include teacher registration system view
include '../../View/Teacher/teacher_registration_system_view.php';
?>
