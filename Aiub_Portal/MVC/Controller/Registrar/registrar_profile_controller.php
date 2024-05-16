<?php

// Include necessary files
include '../../Model/Registrar/registrar_profile_model.php';

// Start session
session_start();

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

// Update profile data if form is submitted
if(isset($_POST['submit'])) {
    $register_id = $_GET['users_id'];
    $message = updateRegisterData($_POST, $register_id);
}

$registerInfo = getRegisterInfo($userId);

// Include view file
include '../../View/Registrar/registrar_profile_view.php';

?>
