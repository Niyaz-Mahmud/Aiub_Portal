<?php

// Include necessary files
include '../../Model/Registrar/registrar_course_management_model.php';
session_start();
$currentPage = "registrar_course_management";

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

// Redirect to login if user is not logged in
if (!isLoggedIn()) {
    header("Location: ../login_controller.php");
    exit;
}

// Get user ID from session
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Variables for pagination
$results_per_page = 10;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $results_per_page;

// Function to calculate total pages
function getTotalPages($results_per_page ) {
    $totalRecords = getTotalRecords(); 
    $totalPages = ceil($totalRecords / $results_per_page );
    return $totalPages;
}

// Search functionality
if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $courses = searchCourses($searchTerm, $start_from, $results_per_page);
} else {
    $courses = fetchCourses($start_from, $results_per_page);
}

// Handle opening class
if(isset($_POST['open_class_id'])){
    $course_id = $_POST['open_class_id'];
    openCourse($course_id);
}

// Handle resetting count
if(isset($_POST['reset_count'])) {
    resetCount();
}

// Handle closing class
if(isset($_POST['close_class_id'])){
    $course_id = $_POST['close_class_id'];
    closeCourse($course_id);
}

// Include view file
include '../../View/Registrar/registrar_course_management_view.php';

?>
