<?php

// Include necessary files
include '../../Model/Registrar/registrar_dashboard_model.php';
session_start();
$currentPage = "registrar_dashboard";

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

// Redirect to login if user is not logged in
if (!isLoggedIn()) {
    header("Location: ../login_controller.php");
    exit;
}

// Get user ID from session
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Include view file
include '../../View/Registrar/registrar_dashboard_view.php';

?>
