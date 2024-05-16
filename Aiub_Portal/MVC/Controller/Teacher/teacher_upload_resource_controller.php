<?php

// Start the session
session_start();

// Include necessary file
include '../../Model/Teacher/teacher_upload_resource_model.php';

// Set current page
$currentPage = "teacher_resource_manage";

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

// Get user ID if available
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Fetch courses for the teacher
$courses = fetchCoursesForTeacher($userId);

// Initialize success message
$successMessage = "";

// Handle file upload
if (isset($_POST['upload'])) {
    // Get course info and filename from the form
    $courseInfo = $_POST['course_name'];
    $filename = $_FILES['file']['name'];

    // Validate inputs
    if (empty($courseInfo) || empty($filename)) {
        $successMessage = "Please fill in all fields.";
    } else {
        // Extract course name and section from course info
        $courseParts = explode('[', $courseInfo);
        $courseName = trim($courseParts[0]);
        $section = isset($courseParts[1]) ? rtrim($courseParts[1], ']') : '';

        // Directory for file uploads
        $uploadDirectory = 'uploads/';
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Move uploaded file to the upload directory
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadDirectory . $filename)) {
            // Insert resource into database
            insertResourceIntoDatabase($userId, $courseName, $section, $filename);
            $successMessage = "File uploaded successfully.";
        } else {
            $successMessage = "File upload failed.";
        }
    }
}

// Include teacher upload resource view
include '../../View/Teacher/teacher_upload_resource_view.php';
?>