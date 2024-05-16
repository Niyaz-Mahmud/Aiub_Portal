<?php
// Start session
session_start();

// Set current page
$currentPage = "registrar_teacher_info";

// Include necessary files
include '../../Model/Registrar/registrar_teacher_info_details_model.php';

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

// Update teacher info if form submitted
if(isset($_POST['submit'])) {
    $message = updateTeacher($_POST);
}

// Fetch teacher info if teacher ID provided
if(isset($_GET['teacher_id'])) {
    $teacher_id = $_GET['teacher_id'];
    $teacher_info = fetchTeacherInfo($teacher_id);
}

// Include teacher info details view
include '../../View/Registrar/registrar_teacher_info_details_view.php';
?>
