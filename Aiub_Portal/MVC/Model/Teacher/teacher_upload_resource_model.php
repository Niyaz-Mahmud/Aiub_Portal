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

    $result = $stmt->get_result();

    $name = $result->fetch_assoc()['name'];

    $stmt->close();
    $conn->close();

    return $name;
}

function fetchCoursesForTeacher($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT distinct course_name, section FROM enrollments WHERE teacher_id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();

    $result = $stmt->get_result();

    $courses = array();
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $courses;
}

function insertResourceIntoDatabase($userId, $courseName, $section, $filename) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO resource (TeacherID, CourseName, Section, Content) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $userId, $courseName, $section, $filename);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

?>
