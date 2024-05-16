<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function fetchEnrollments($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT distinct course_name, section FROM enrollments WHERE teacher_id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $courses = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }

    $stmt->close();
    $conn->close();

    return $courses;
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

function insertNotice($teacher_id, $courseName, $section, $message) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO notice (teacher_id, course_name, section, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $teacher_id, $courseName, $section, $message);

    $success = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $success;
}
?>
