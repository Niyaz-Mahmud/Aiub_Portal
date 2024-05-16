<?php
// Start session
session_start();

// Set current page
$currentPage = "registrar_student_info";

// Include necessary files
include '../../Model/Registrar/registrar_student_info_details_model.php';

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

// Update student info if form submitted
if(isset($_POST['submit'])) {
    $message = updateStudentInfo($_POST);
}

// Fetch student info if student ID provided
if(isset($_GET['student_id'])) {
    $studentId = $_GET['student_id'];
    $studentInfo = fetchStudentInfo($studentId);
}

// Include student info details view
include '../../View/Registrar/registrar_student_info_details_view.php';
?>
