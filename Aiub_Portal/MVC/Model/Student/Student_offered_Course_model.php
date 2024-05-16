<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function searchCourseData($searchTerm, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $searchTerm = "%" . $searchTerm . "%";

    $stmt = $conn->prepare("SELECT course_id, course_name, section, status, capacity, count, DATE_FORMAT(start_time, '%H:%i') AS start_time, DATE_FORMAT(end_time, '%H:%i') 
    AS end_time, day FROM courses WHERE course_name LIKE ? OR section LIKE ? LIMIT ?, ?");
    $stmt->bind_param("ssii", $searchTerm, $searchTerm, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();

    return $result;
}

function fetchNameFromDatabase($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT student_name FROM student WHERE student_id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $name = $result->fetch_assoc()['student_name'];
    $stmt->close();
    $conn->close();

    return $name;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM courses");
    $stmt->execute();
    $result = $stmt->get_result();
    $totalRecords = $result->fetch_assoc()['total'];
    $stmt->close();
    $conn->close();

    return $totalRecords;
}

function fetchCourseData($start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT course_id, course_name, section, status, capacity, count, DATE_FORMAT(start_time, '%H:%i') AS start_time, DATE_FORMAT(end_time, '%H:%i') AS end_time, day FROM courses LIMIT ?, ?");
    $stmt->bind_param("ii", $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();

    return $result;
}

?>
