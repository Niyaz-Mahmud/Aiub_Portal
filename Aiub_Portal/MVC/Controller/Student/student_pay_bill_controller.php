<?php
// Include necessary files
require_once '../../Model/Student/student_pay_bill_model.php';

// Start session
session_start();

// Define current page
$currentPage ="payment";

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['users_id']);
}

// Logout functionality
if (isset($_GET['logout'])) {
    // Destroy session and redirect to login page
    $_SESSION = array();
    session_destroy();
    header("Location: ../login_controller.php");
    exit;
}

// Redirect to login page if user is not logged in
if (!isLoggedIn()) {
    header("Location: ../login_controller.php");
    exit;
}

// Get user ID from query parameter
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Generate welcome message based on user ID
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Process payment if form is submitted
if(isset($_POST['amountToPay'])) {
    $paymentId = $_GET['payment_id'];
    $amountToPay = $_POST['amountToPay'];
    $userId = $_GET['users_id'];

    // Update payment in the database
    updatePaymentInDatabase($paymentId, $userId, $amountToPay);

    // Redirect back to payment page
    header("Location: student_payment_controller.php?users_id=$userId");
    exit;
}

// Include the view file
include '../../View/Student/student_pay_bill_view.php';
?>
