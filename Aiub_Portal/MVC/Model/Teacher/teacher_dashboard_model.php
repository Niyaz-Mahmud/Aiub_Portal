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

function fetchUserCourses($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT c.day, c.course_name, c.section, DATE_FORMAT(c.start_time, '%H:%i') AS start_time, DATE_FORMAT(c.end_time, '%H:%i') AS end_time 
    FROM courses c
    INNER JOIN enrollments e ON c.course_id = e.course_id
    WHERE e.teacher_id = ?
    GROUP BY c.day, c.course_name, c.section, start_time, end_time
    ORDER BY FIELD(c.day, 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[$row['day']][] = $row;
    }

    $stmt->close();
    $conn->close();

    return $courses;
}
?>
