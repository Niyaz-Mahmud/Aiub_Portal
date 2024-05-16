<?php

// Include necessary files
include '../../Model/Registrar/registrar_change_account_info_model.php';
session_start();
$currentPage = "registrar_manage_user";

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

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteUser($id);
        header("Location:registrar_manage.user_controller.php?users_id=" . $_SESSION['users_id']);
        exit;
    } else {
        echo "ID parameter is missing in the URL.";
        exit;
    }
}

// Handle update request
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['delete'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        updateUser($id, $role, $password, $email, $phone);
        $updateSuccessMessage = "User information updated successfully";
    } else {
        echo "ID parameter is missing in the URL.";
    }
}

// Include view file
include '../../View/Registrar/registrar_change_account_info_view.php';
?>
