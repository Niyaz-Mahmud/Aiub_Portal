<?php

// Include necessary files
include '../../Model/Registrar/registrar_add_book_model.php';
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
    // Check if required fields are set and not empty
    if (isset($_POST['name']) && isset($_POST['author']) && isset($_POST['category']) &&
        !empty($_POST['name']) && !empty($_POST['author']) && !empty($_POST['category'])) {
        
        $name = htmlspecialchars($_POST['name']);
        $author = htmlspecialchars($_POST['author']);
        $category = htmlspecialchars($_POST['category']);
        
        // Insert book into library resource
        insertIntoLibraryResource($name, $author, $category);
        $_SESSION['success_message'] = "Book added successfully.";
        header("Location: {$_SERVER['PHP_SELF']}?users_id={$_POST['users_id']}");
        exit;
    } else {
        $_SESSION['error_message'] = "All fields are required.";
    }
}

// Include view file
include '../../View/Registrar/registrar_add_book_view.php';
?>
