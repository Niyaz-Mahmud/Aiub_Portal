<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function dropCourse($courseName, $section, $studentId, $semester) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT teacher_id FROM enrollments WHERE course_name=? AND section=? AND student_id=? AND semester=?");
    $stmt->bind_param("ssss", $courseName, $section, $studentId, $semester);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $teacherId = $row['teacher_id']; 

    $stmt->close();

    $stmt = $conn->prepare("INSERT INTO drop_table (course_name, section, student_id, teacher_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $courseName, $section, $studentId, $teacherId);
    $stmt->execute();
    $stmt->close();

    $conn->close();

}

function fetchNameFromDatabase($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT student_name FROM student WHERE student_id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $name;
}

function fetchGradesFromDatabase($userId, $semester) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT course_name, section FROM enrollments WHERE student_id = ? AND semester = ?");
    $stmt->bind_param("ss", $userId, $semester);
    $stmt->execute();
    $result = $stmt->get_result();
    $grades = array(); 

    while ($row = $result->fetch_assoc()) {
        $grades[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $grades;
}

function fetchSemestersFromDatabase($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT DISTINCT semester FROM enrollments WHERE student_id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $semesters = array();

    while ($row = $result->fetch_assoc()) {
        $semesters[] = $row['semester'];
    }

    $stmt->close();
    $conn->close();

    return $semesters;
}

?>
