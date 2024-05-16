<?php

// Start the session
session_start();

// Include necessary file
require_once '../../Model/HR/hr_teacher_info_model.php';

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

// Function to calculate total pages
function getTotalPages($results_per_page ) {
    $totalRecords = getTotalRecords(); 
    $totalPages = ceil($totalRecords / $results_per_page );
    return $totalPages;
}

// Set current page
$currentPage = "hr_teacher_info"; 

// Set results per page
$results_per_page  = 10;

// Determine the current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($page - 1) * $results_per_page ;

// Check if search term is provided
if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $teachers = searchTeachers($searchTerm, $results_per_page , $startFrom);
} else {
    $teachers = fetchTeachersDetails($startFrom, $results_per_page );
}

// Get user ID if available
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Include HR teacher info view
include '../../View/HR/hr_teacher_info_view.php';
?>
