<?php

// Start the session
session_start();

// Include necessary file
include '../../Model/Teacher/teacher_request_leave_model.php';

// Set current page
$currentPage = "teacher_leave_status";

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

// Fetch user info
$userInfo = fetchUserInfoFromDatabase($userId);
$username = $userInfo['name'];
$department = $userInfo['department'];

// Process leave request if POST request is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reason']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['users_id'])) {
    $reason = $_POST['reason'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $userId = $_POST['users_id'];

    // Insert leave request into database
    $inserted = insertLeaveRequest($userId, $reason, $start_date, $end_date);

    // Set message based on insertion status
    if ($inserted) {
        $message = "Leave request submitted successfully!";
    } else {
        $message = "Failed to submit leave request";
    }
}

// Include teacher request leave view
include '../../View/Teacher/teacher_request_leave_view.php';
?>
