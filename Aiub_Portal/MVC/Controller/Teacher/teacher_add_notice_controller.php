<?php

// Start the session
session_start();

// Include necessary file
include '../../Model/Teacher/teacher_add_notice_model.php';

// Set current page
$currentPage = "teacher_publish_notice";

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

// Function to validate form data
function validateFormData($data) {
    // Trim whitespace from the beginning and end of the data
    $data = trim($data);
    // Remove backslashes (\)
    $data = stripslashes($data);
    // Convert HTML special characters to entities
    $data = htmlspecialchars($data);
    return $data;
}

// Get user ID if available
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Fetch enrollments if user ID is available
if ($userId !== null) {
    $enrollments = fetchEnrollments($userId);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Validate and sanitize form data
    $teacherId = validateFormData($userId); 
    $courseInfo = validateFormData($_POST['course']);
    $message = validateFormData($_POST['notice_content']);

    // Check if all required fields are filled
    if (!empty($teacherId) && !empty($courseInfo) && !empty($message)) {
        // Process course information
        $courseParts = explode('[', $courseInfo);
        $courseName = trim($courseParts[0]); 
        $section = rtrim($courseParts[1], ']'); 
        
        // Insert notice
        $inserted = insertNotice($teacherId, $courseName, $section, $message);

        // Set message based on insertion result
        if ($inserted) {
            $message = "Notice posted successfully";
        } else {
            $message = "Error posting notice";
        }
    } else {
        $errorMessage = "Please fill in all fields.";
    }
}

// Include teacher add notice view
include '../../View/Teacher/teacher_add_notice_view.php';
?>
