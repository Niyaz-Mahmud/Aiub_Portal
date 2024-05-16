<?php
// Start session
session_start();

// Include necessary files
require_once '../../Model/Registrar/registrar_teacher_info_model.php';

// Set current page
$currentPage = "registrar_teacher_info";

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['users_id']);
}

// Logout functionality
if (isset($_GET['logout'])) {
    // Clear session data
    $_SESSION = array();
    session_destroy();
    
    // Redirect to login page
    header("Location: ../login_controller.php");
    exit;
}

// Redirect to login page if user is not logged in
if (!isLoggedIn()) {
    header("Location: ../login_controller.php");
    exit;
}

// Get user ID from URL parameter
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Process teacher leave request if form submitted
if (isset($_POST['left_teacher_id'])) {
    $teacherId = $_POST['left_teacher_id'];
    leaveTeacher($teacherId);
}

// Number of results per page
$results_per_page = 10;

// Determine current page
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Calculate starting record for pagination
$start_from = ($page - 1) * $results_per_page;

// Function to calculate total pages for pagination
function getTotalPages($results_per_page ) {
    $totalRecords = getTotalRecords(); 

    $totalPages = ceil($totalRecords / $results_per_page );

    return $totalPages;
}

// Search functionality
if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $teachers = searchTeachers($searchTerm, $start_from, $results_per_page);
} else {
    $teachers = fetchTeachersFromDatabase($start_from, $results_per_page);
}

// Include teacher info view
include '../../View/Registrar/registrar_teacher_info_view.php';
?>
