<?php
// Start the session
session_start();

// Define the current page
$currentPage = "teacher_submit_grade";

// Include the model for uploading marks
include '../../Model/Teacher/teacher_upload_marks_model.php';

// Function to check if a user is logged in
function isLoggedIn() {
    return isset($_SESSION['users_id']);
}

// If logout is requested, destroy the session and redirect to login page
if (isset($_GET['logout'])) {
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

// Get the user ID from GET parameter
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message based on whether user is specified or not
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Get student ID, course, and section from GET parameters
$studentId = isset($_GET['student_id']) ? $_GET['student_id'] : null;
$course = isset($_GET['course']) ? $_GET['course'] : null;
$section = isset($_GET['section']) ? $_GET['section'] : null;

// Initialize array for storing grades and total grade
$grades = [];
$total_grade = 0;

// If user ID is available
if ($userId) {
    // If student ID, course, and section are provided
    if ($studentId && $course && $section) {
        // Fetch grades for the specified student, course, and section
        $grades = fetchGradesFromDatabase($userId, $studentId, $course, $section);

        // Calculate total grade based on mid and final grades if available
        if (isset($grades[0]['mid_grade'])) {
            $total_grade += $grades[0]['mid_grade'] * 0.4;
        }
        if (isset($grades[0]['final_grade'])) {
            $total_grade += $grades[0]['final_grade'] * 0.6;
        }
    }
}

// If form is submitted for uploading grades
if (isset($_POST['upload'])) {
    // Get form data
    $userId = isset($_GET['users_id']) ? $_GET['users_id'] : null;
    $studentId = isset($_GET['student_id']) ? $_GET['student_id'] : null;
    $course = isset($_GET['course']) ? $_GET['course'] : null;
    $section = isset($_GET['section']) ? $_GET['section'] : null;
    $semester = isset($_GET['semester']) ? $_GET['semester'] : null;

    $mid_quiz1 = isset($_POST['mid_quiz1']) ? $_POST['mid_quiz1'] : null;
    $mid_quiz2 = isset($_POST['mid_quiz2']) ? $_POST['mid_quiz2'] : null;
    $mid_best_quiz = isset($_POST['mid_best_quiz']) ? $_POST['mid_best_quiz'] : null;
    $mid_attendance = isset($_POST['mid_attendance']) ? $_POST['mid_attendance'] : null;
    $mid_written = isset($_POST['mid_written']) ? $_POST['mid_written'] : null;
    $mid_grade = isset($_POST['mid_grade']) ? $_POST['mid_grade'] : null;
    $mid_assignment = isset($_POST['mid_assignment']) ? $_POST['mid_assignment'] : null;
    $final_quiz1 = isset($_POST['final_quiz1']) ? $_POST['final_quiz1'] : null;
    $final_quiz2 = isset($_POST['final_quiz2']) ? $_POST['final_quiz2'] : null;
    $final_best_quiz = isset($_POST['final_best_quiz']) ? $_POST['final_best_quiz'] : null;
    $final_attendance = isset($_POST['final_attendance']) ? $_POST['final_attendance'] : null;
    $final_written = isset($_POST['final_written']) ? $_POST['final_written'] : null;
    $final_grade = isset($_POST['final_grade']) ? $_POST['final_grade'] : null;
    $final_assignment = isset($_POST['final_assignment']) ? $_POST['final_assignment'] : null;

    // Calculate total grade
    $total_grade = round($mid_grade * 0.4 + $final_grade * 0.6);

    // Upload grades to the database
    uploadGradesToDatabase($userId, $studentId, $course, $section, $semester, $mid_quiz1, $mid_quiz2, $mid_best_quiz, $mid_attendance, $mid_written, $mid_grade, $mid_assignment, 
                           $final_quiz1, $final_quiz2, $final_best_quiz, $final_attendance, $final_written, $final_grade, $final_assignment, $total_grade);

    // Fetch grades after uploading
    $grades = fetchGradesFromDatabase($userId, $studentId, $course, $section);
}

// Include the view file for uploading marks
include '../../View/Teacher/teacher_upload_marks_view.php';
?>
