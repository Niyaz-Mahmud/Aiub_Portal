<?php
// Include necessary files
include '../../Model/Student/student_course_and_results_model.php';
session_start();

// Define current page
$currentPage = "course_and_results";

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

// Fetch grades, courses, and semesters based on query parameters
if (isset($_GET['users_id']) && isset($_GET['semester'])) {
    $userId = $_GET['users_id'];
    $grades = fetchGradesFromDatabase($userId);
    $courses = fetchCoursesFromDatabase($userId, $_GET["semester"]);
    $semesters = fetchSemestersFromDatabase($userId);
} elseif ($_GET['users_id']) {
    $userId = $_GET['users_id'];
    $grades = fetchGradesFromDatabase($userId);
    $courses = fetchCoursesFromDatabase($userId, "Spring");
    $semesters = fetchSemestersFromDatabase($userId);
}

// Include the view file
include '../../View/Student/student_course_and_results_view.php';
?>
