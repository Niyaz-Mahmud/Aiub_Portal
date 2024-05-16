<?php
// Include necessary files
include '../../Model/Student/student_resource_model.php';

// Start session
session_start();

// Define current page
$currentPage ="resources";

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

// Number of results per page
$results_per_page = 10;

// Pagination
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $results_per_page;

// Function to calculate total pages for pagination
function getTotalPages($results_per_page ) {
    $totalRecords = getTotalRecords(); 
    $totalPages = ceil($totalRecords / $results_per_page );
    return $totalPages;
}

// Fetch student resources and courses
$studentResources = fetchStudentResources($userId);
$studentCourses = fetchStudentCourses($userId);

// Include the view file
include '../../View/Student/student_resource_view.php';
?>
