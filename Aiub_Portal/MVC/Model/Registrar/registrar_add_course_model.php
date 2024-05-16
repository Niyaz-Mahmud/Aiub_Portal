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

    $stmt = $conn->prepare("SELECT RegisterName FROM register WHERE RegisterID = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($registerName);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $registerName;
}

function isCourseAvailable($courseName, $section) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT * FROM courses WHERE course_name = ? AND Section = ?");
    $stmt->bind_param("ss", $courseName, $section);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    return $result->num_rows > 0;
}

function addCourseToDatabase($course_name, $section, $capacity, $start_time, $end_time, $status, $weekday) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO courses (course_name, Section, Capacity, Start_Time, End_Time, Status, day, count) VALUES (?, ?, ?, ?, ?, ?, ?, 0)");
    $stmt->bind_param("ssissss", $course_name, $section, $capacity, $start_time, $end_time, $status, $weekday);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

?>
