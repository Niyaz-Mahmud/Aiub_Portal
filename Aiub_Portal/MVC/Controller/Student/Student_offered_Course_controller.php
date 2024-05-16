<?php
// Include necessary files
include '../../Model/Student/Student_offered_Course_model.php';

// Start session
session_start();

// Define current page
$currentPage ="offered_courses";

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
$results_per_page = 18;

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

// Fetch course data
if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $result = searchCourseData($searchTerm, $start_from, $results_per_page);
} else {
    $result = fetchCourseData($start_from, $results_per_page);
}

// Include the view file
include '../../View/Student/Student_offered_Course_view.php';
?>
