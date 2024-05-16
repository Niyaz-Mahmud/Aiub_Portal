<?php

// Start the session
session_start();

// Include necessary files
require_once "../../Model/HR/hr_add_payment_model.php";

// Set current page
$currentPage = "hr_payroll_process";

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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $employeeId = validateFormData($_GET['row_id']);
    $name = validateFormData($_POST['name']);
    $month = validateFormData($_POST['month']) . ' ' . date("Y");
    $salary = validateFormData($_POST['salary']);
    $bonus = validateFormData($_POST['bonus']);
    $totalSalary = validateFormData($_POST['total_salary']);

    // Insert payroll data into database if all fields are filled
    if (!empty($employeeId) && !empty($name) && !empty($month) && !empty($salary) && !empty($bonus) && !empty($totalSalary)) {
        // Insert payroll data into database
        insertPayrollData($employeeId, $name, $month, $salary, $bonus, $totalSalary);
    } else {
        // If any field is empty, redirect back to the form with an error message
        $errorMessage = "Please fill in all fields.";
    }
}

// Get user ID if available
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Include HR add payment view
include '../../View/HR/hr_add_payment_view.php';
?>
