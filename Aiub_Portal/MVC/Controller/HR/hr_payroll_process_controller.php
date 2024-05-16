<?php

// Start the session
session_start();

// Include necessary file
include '../../Model/HR/hr_payroll_process_model.php';

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
$currentPage = "hr_payroll_process"; 

// Pagination setup
$results_per_page  = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($page - 1) * $results_per_page ;

// Fetch register info and teacher info from database
$registerInfo = fetchRegisterInfoFromDatabase($startFrom, $results_per_page );
$teacherInfo = fetchTeacherInfoFromDatabase($startFrom, $results_per_page );

// Check if search term is provided
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $registerInfo = searchRegisterInfo($searchTerm);
    $teacherInfo = searchTeacherInfo($searchTerm);
} else {
    $registerInfo = fetchRegisterInfoFromDatabase($startFrom, $results_per_page );
    $teacherInfo = fetchTeacherInfoFromDatabase($startFrom, $results_per_page );
}

// Get user ID if available
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Include HR payroll process view
include '../../View/HR/hr_payroll_process_view.php';
?>
