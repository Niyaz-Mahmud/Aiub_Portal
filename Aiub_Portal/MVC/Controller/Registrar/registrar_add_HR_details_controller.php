<?php

// Include necessary files
include '../../Model/Registrar/registrar_add_HR_details_model.php';
session_start();

// Function to check if user is logged in
function isLoggedIn()
{
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Collect form data
        $data = array(
            'HRName' => $_POST['HRName'],
            'FatherName' => $_POST['FatherName'],
            'MotherName' => $_POST['MotherName'],
            'BloodGroup' => $_POST['BloodGroup'],
            'Address' => $_POST['Address'],
            'Religion' => $_POST['Religion'],
            'MaritalStatus' => $_POST['MaritalStatus'],
            'JoiningDate' => $_POST['JoiningDate'],
            'Nationality' => $_POST['Nationality']
        );

        // Get HRID, email, and phone
        $HRID = $_GET['user_id'] ?? '';
        $email = $_GET['email'] ?? '';
        $phone = $_GET['phone'] ?? '';

        // Add HR details to database
        $message = addHRToDatabase($data, $HRID, $email, $phone);
    }
}

// Include view file
include '../../View/Registrar/registrar_add_HR_details_view.php';
?>
