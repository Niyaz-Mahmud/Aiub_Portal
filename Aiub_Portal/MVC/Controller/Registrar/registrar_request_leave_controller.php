<?php
// Include necessary files
include '../../Model/Registrar/registrar_request_leave_model.php';

// Start session
session_start();

// Set current page
$currentPage = "registrar_leave_status";

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

// Process leave request form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reason']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['users_id'])) {
    $reason = $_POST['reason'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $userId = $_POST['users_id'];

    // Insert leave request into database
    if (insertLeaveRequest($userId, $reason, $start_date, $end_date)) {
        $message = "Leave request submitted successfully!";
    } else {
        $error = "Error occurred while submitting leave request.";
    }
}

// Include leave request view
include '../../View/Registrar/registrar_request_leave_view.php';
?>
