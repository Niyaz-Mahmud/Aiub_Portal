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

    $stmt = $conn->prepare("SELECT student_name FROM student WHERE student_id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $name;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM resource");

    $stmt->execute();
    $stmt->bind_result($totalRecords);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $totalRecords;
}

function fetchStudentResources($userId) {
    $conn = connectToDatabase();

    $stmtCourse = $conn->prepare("SELECT c.course_name, c.section
    FROM courses c 
    INNER JOIN enrollments e ON c.course_id = e.course_id 
    WHERE e.student_id = ?");
    $stmtCourse->bind_param("s", $userId);
    $stmtCourse->execute();
    $resultCourse = $stmtCourse->get_result();

    $resources = [];

    while ($rowCourse = $resultCourse->fetch_assoc()) {
        $stmt = $conn->prepare("SELECT ResourceID, CourseName, Section, Content FROM resource WHERE CourseName = ? AND Section = ?");
        $stmt->bind_param("ss", $rowCourse['course_name'], $rowCourse['section']);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $resources[] = $row;
        }

        $stmt->close(); 
    }

    $stmtCourse->close(); 
    $conn->close(); 

    return $resources;
}

function fetchStudentCourses($userId) {
    $conn = connectToDatabase();

    $stmtCourse = $conn->prepare("SELECT c.course_name, c.section
    FROM courses c 
    INNER JOIN enrollments e ON c.course_id = e.course_id 
    WHERE e.student_id = ?");
    $stmtCourse->bind_param("s", $userId);
    $stmtCourse->execute();
    $resultCourse = $stmtCourse->get_result();

    $courses = [];

    while ($rowCourse = $resultCourse->fetch_assoc()) {
        $courses[] = $rowCourse;
    }

    $stmtCourse->close();
    $conn->close();

    return $courses;
}

?>
