<?php

// Include necessary files
include '../../Model/Registrar/registrar_add_registar_details_model.php';
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Collect form data
        $data = array(
            'RegisterName' => $_POST['RegisterName'],
            'FatherName' => $_POST['fathername'],
            'MotherName' => $_POST['mothername'],
            'BloodGroup' => $_POST['blood_group'],
            'Nationality' => $_POST['nationality'],
            'Address' => $_POST['address'],
            'Sex' => $_POST['sex'],
            'Religion' => $_POST['religion'],
            'JoiningDate' => $_POST['joining_date'],
            'MaritalStatus' => $_POST['marital_status'],
            'DOB' => $_POST['dob']
        );

        // Get user ID, email, and phone
        $user_Id = $_GET['user_id'] ?? '';
        $email = $_GET['email'] ?? '';
        $phone = $_GET['phone'] ?? '';

        // Add registrar details to database
        $message = addRegistrarToDatabase($data, $user_Id, $email, $phone);
    }
}

// Include view file
include '../../View/Registrar/registrar_add_registar_details_view.php';
?>
