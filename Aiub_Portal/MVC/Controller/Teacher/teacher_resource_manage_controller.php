<?php

// Start the session
session_start();

// Include necessary file
include '../../Model/Teacher/teacher_resource_manage_model.php';

// Set current page
$currentPage = "teacher_resource_manage";

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
    $resources = searchResourcesFromDatabase($userId, $searchTerm, $startFrom, $results_per_page );
} else {
    $resources = fetchResourcesFromDatabase($userId, $startFrom, $results_per_page );
}

// Include teacher resource manage view
include '../../View/Teacher/teacher_resource_manage_view.php';
?>
