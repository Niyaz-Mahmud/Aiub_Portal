<?php

// Include necessary files
include '../../Model/Registrar/registrar_add_student_details_model.php';
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
            'student_name' => $_POST['student_name'],
            'blood_group' => $_POST['blood_group'],
            'father_name' => $_POST['father_name'],
            'mother_name' => $_POST['mother_name'],
            'department' => $_POST['department'],
            'address' => $_POST['address'],
            'nationality' => $_POST['nationality'],
            'sex' => $_POST['sex'],
            'religion' => $_POST['religion'],
            'dob' => $_POST['dob'],
            'marital_status' => $_POST['marital_status'],
            'admission_date' => $_POST['admission_date']
        );

        // Get user ID, email, and phone
        $user_Id = $_GET['user_id'] ?? '';
        $email = $_GET['email'] ?? '';
        $phone = $_GET['phone'] ?? '';

        // Add student details to database
        $message = addStudentToDatabase($data, $user_Id, $email, $phone);
    }
}

// Include view file
include '../../View/Registrar/registrar_add_student_details_view.php';
?>
