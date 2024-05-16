<?php

// Start the session
session_start();

// Include the necessary model file
include '../../Model/Teacher/teacher_submit_grade_model.php';

// Check if user_id and semester are set in the GET request
if (isset($_GET['users_id']) && isset($_GET['semester'])) {
    
    // Retrieve user_id and semester from GET parameters
    $user_id = $_GET['users_id'];
    $semester = $_GET['semester'];

    // Fetch courses from the database based on user_id and semester
    $courses = fetchCoursesFromDatabase($user_id, $semester);

    // Construct an array with course and section details
    $courseDetails = array(
        'course' => key($courses),
        'section' => $courses[key($courses)]
    );

    // Convert course details array to JSON format
    $jsonData = json_encode($courseDetails);

    // Set the response header to indicate JSON content
    header('Content-Type: application/json');

    // Send the JSON response
    echo $jsonData;

    // Exit the script
    exit();
}
?>
