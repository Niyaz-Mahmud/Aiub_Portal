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

function fetchCoursesFromDatabase($userId, $semester = NULL) {
    $conn = connectToDatabase();

    if (is_null($semester)) {
        $stmt = $conn->prepare("SELECT DISTINCT course_name, section FROM enrollments WHERE teacher_id = ?");
        $stmt->bind_param("s", $userId);
    } else {
        $stmt = $conn->prepare("SELECT DISTINCT course_name, section FROM enrollments WHERE teacher_id = ? AND semester = ?");
        $stmt->bind_param("ss", $userId, $semester);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $courses = array();

    while ($row = $result->fetch_assoc()) {
        $courses[$row['course_name']][] = $row['section'];
    }

    $stmt->close();
    $conn->close();

    return $courses;
}

function fetchSemestersFromDatabase($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT DISTINCT semester FROM enrollments WHERE teacher_id = ?");
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

function fetchStudentsForCourseAndSemester($course, $section, $semester) {
    $course = trim(substr($course, 0, strpos($course, '[')));

    $conn = connectToDatabase();
    $stmt = $conn->prepare("SELECT e.student_id, s.student_name FROM enrollments e INNER JOIN student s ON e.student_id = s.student_id WHERE e.course_name = ? AND e.section = ? AND e.semester = ?");
    $stmt->bind_param("sss", $course, $section, $semester);
    $stmt->execute();
    $result = $stmt->get_result();
    $students = array();

    while ($row = $result->fetch_assoc()) {
        $students[] = array(
            'student_id' => $row['student_id'],
            'student_name' => $row['student_name']
        );
    }

    $stmt->close();
    $conn->close();

    return $students;
}

?>
