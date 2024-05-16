<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function fetchNameFromDatabase($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT name FROM teacher WHERE id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $name;
}

function fetchCoursesWithPagination($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT course_id, course_name, section, status, capacity, count, DATE_FORMAT(start_time, '%H:%i') AS start_time, DATE_FORMAT(end_time, '%H:%i') AS end_time, day FROM courses LIMIT ?, ?");
    $stmt->bind_param("ii", $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    return $result;
}

function searchCoursesWithPagination($userId, $searchTerm, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT course_id, course_name, section, status, capacity, count, DATE_FORMAT(start_time, '%H:%i') AS start_time, DATE_FORMAT(end_time, '%H:%i') AS end_time, day FROM courses WHERE course_name LIKE ? LIMIT ?, ?");
    $searchTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("sii", $searchTerm, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    return $result;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM courses");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $row["total"];
}
?>
