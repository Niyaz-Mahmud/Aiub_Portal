<?php
// Start the session
session_start();

// Include the forgetpass_model.php file which contains necessary functions
include_once '../Model/forgetpass_model.php';

// Initialize error message
$error_message = '';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = connectToDatabase();

    // Retrieve form data
    $users_id = $_POST['users_id'];
    $password = $_POST['password'];

    // Check if any field is empty
    if (empty($users_id) || empty($password)) {
        $error_message = "User ID and password are required.";
    } else {
        // Escape special characters to prevent SQL injection
        $users_id = mysqli_real_escape_string($conn, $users_id);
        $password = mysqli_real_escape_string($conn, $password);

        // Retrieve user data from the database based on user ID
        $user = getUserById($conn, $users_id);

        if ($user) {
            // Get the stored password from the database
            $stored_password = $user['password'];
            $password_length = strlen($password);
            $match = false;

            // Check if any substring of length 3 from the new password matches with the stored password
            for ($i = 0; $i <= $password_length - 3; $i++) {
                $sub_password = substr($password, $i, 3);
                if (strpos($stored_password, $sub_password) !== false) {
                    $match = true;
                    break;
                }
            }

            if ($match) {
                // Store user ID in session and cookie for further use
                $_SESSION['users_id'] = $users_id;
                
                setcookie('users_id', $users_id, time() + (86400 * 30), "/");

                // Redirect to reset password controller with user ID parameter
                header("Location: resetpass_controller.php?users_id=" . urlencode($users_id));
                exit();
            } else {
                $error_message = "The password must match any three characters with the stored password.";
            }
        } else {
            $error_message = "User ID not found.";
        }
    }

    // Close the database connection
    $conn->close();
}

// Include the forgetpass_view.php file to display the forget password form
include '../View/forgetpass_view.php';
?>
