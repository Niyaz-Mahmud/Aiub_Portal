<?php
// Include necessary files
include '../../Model/Registrar/registar_checkout_book_model.php';
session_start();

// Define current page
$currentPage = "registrar_manage_library_resource";

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
    $studentId = $_POST['id'];
    $studentName = $_POST['username'];
    $resourceId = $_POST['resourceId'];

    // Update library resource
    if (updateLibraryResource($studentId, $studentName, $resourceId)) {
        header("Location: registrar_manage_library_resource_controller.php?users_id=$userId");
        exit();
    }
}

// Handle GET request to fetch student name
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['fetch_student_name'])) {
    $studentId = $_GET['studentId'];
    $studentName = fetchStudentName($studentId);
    echo $studentName;
    exit(); 
}

// Include view file
include '../../View/Registrar/registar_checkout_book_view.php';
?>
