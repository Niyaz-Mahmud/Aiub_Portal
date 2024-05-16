<?php
// Include necessary files
include '../../Model/Student/student_grade_report_model.php';

// Start session
session_start();

// Define current page
$currentPage ="grade_report";

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

// Function to calculate grade point
function calculateGradePoint($totalGrade) {
    if ($totalGrade >= 90) {
        return 4.00;
    } elseif ($totalGrade >= 85) {
        return 3.75;
    } elseif ($totalGrade >= 80) {
        return 3.50;
    } elseif ($totalGrade >= 75) {
        return 3.25;
    } elseif ($totalGrade >= 70) {
        return 3.00;
    } elseif ($totalGrade >= 65) {
        return 2.75;
    } elseif ($totalGrade >= 60) {
        return 2.50;
    } elseif ($totalGrade >= 50) {
        return 2.25;
    } else {
        return 0.00;
    }
}

// Calculate CGPA
if(isset($_GET['users_id'])) {
    $studentId = $_GET['users_id'];
    $courseInfo = fetchCourseInfo($studentId);

    $totalGradePoints = 0;
    $completedCoursesCount = count($courseInfo);

    foreach($courseInfo as $course) {
        $totalGradePoints += calculateGradePoint($course['total_grade']);
    }

    $cgpa = ($completedCoursesCount > 0) ? ($totalGradePoints / $completedCoursesCount) : 0;
}

// Include the view file
include '../../View/Student/student_grade_report_view.php';
?>
