<?php

// Include necessary files
include '../../Model/Registrar/registrar_add_teacher_details_model.php'; 
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Collect form data
    $data = array(
        'name' => $_POST['name'],
        'fathername' => $_POST['fathername'],
        'mothername' => $_POST['mothername'],
        'dob' => $_POST['dob'],
        'sex' => $_POST['sex'],
        'address' => $_POST['address'],
        'religion' => $_POST['religion'],
        'marital_status' => $_POST['marital_status'],
        'nationality' => $_POST['nationality'],
        'blood_group' => $_POST['blood_group'],
        'department' => $_POST['department'],
        'joining_date' => $_POST['joining_date'],
        'salary' => $_POST['salary']
    );

    // Get user ID, email, and phone
    $id = $_GET['user_id'] ?? '';
    $email = $_GET['email'] ?? '';
    $phone = $_GET['phone'] ?? '';

    // Add teacher details to database
    $message = addTeacherToDatabase($data, $id, $email, $phone);
}

// Include view file
include '../../View/Registrar/registrar_add_teacher_details_view.php';
?>
