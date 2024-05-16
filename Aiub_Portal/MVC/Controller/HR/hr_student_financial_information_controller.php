<?php

// Start the session
session_start();

// Include necessary file
require_once '../../Model/HR/hr_student_information_model.php';

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
$currentPage = "hr_student_financial_information"; 

// Get user ID if available
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Set results per page
$results_per_page  = 10;

// Determine the current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($page - 1) * $results_per_page ;

// Check if search term is provided
if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $studentFinancialDetails = searchStudentFinancialDetails($searchTerm, $startFrom, $results_per_page );
} else {
    $studentFinancialDetails = fetchStudentFinancialDetails($startFrom, $results_per_page );
}

// Include HR student financial information view
require_once '../../View/HR/hr_student_financial_information_view.php';
?>
