<?php
// Include necessary files
include '../../Model/Student/student_drop_course_model.php'; 

// Start session
session_start();

// Define current page
$currentPage ="drop_course";

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

// Initialize variables
$grades = array(); 
$semester = isset($_GET['semester']) ? $_GET['semester'] : "Spring";

// Fetch grades and semesters from database
if (isset($_GET['users_id'])) {
    $userId = $_GET['users_id'];
    $semesters = fetchSemestersFromDatabase($userId);
    $grades = fetchGradesFromDatabase($userId, $semester);
} 

// Drop course if form is submitted
if (isset($_POST['drop_course'])) {
    $courseName = $_POST['course_name'];
    $section = $_POST['section'];
    $studentId = $_GET['users_id'];

    dropCourse($courseName, $section, $studentId, $semester);
}

// Include the view file
include '../../View/Student/student_drop_course_view.php';
?>
