<?php

// Include necessary files
include '../../Model/Registrar/registrar_manage_library_resource_model.php';

// Start session
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

// Update resource availability if POST request with resourceId is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['resourceId'])) {
    $resourceId = $_POST['resourceId'];
    updateResourceAvailability($resourceId);
}

// Pagination
$results_per_page = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $results_per_page;

// Function to calculate total pages
function getTotalPages($results_per_page ) {
    $totalRecords = getTotalRecords(); 
    $totalPages = ceil($totalRecords / $results_per_page );
    return $totalPages;
}

// Search functionality
if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $libraryResources = searchLibraryResources($searchTerm, $start_from, $results_per_page);
} else {
    $libraryResources = fetchLibraryResources($start_from, $results_per_page);
}

// Include view file
include '../../View/Registrar/registrar_manage_library_resource_view.php';

?>
