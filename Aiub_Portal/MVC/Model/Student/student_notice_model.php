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

function fetchStudentResources($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmtCourse = $conn->prepare("SELECT c.course_name, c.section
    FROM courses c 
    INNER JOIN enrollments e ON c.course_id = e.course_id 
    WHERE e.student_id = ?");
    $stmtCourse->bind_param("s", $userId);
    $stmtCourse->execute();
    $resultCourse = $stmtCourse->get_result();

    $resources = array();

    while ($rowCourse = $resultCourse->fetch_assoc()) {
        $stmt = $conn->prepare("SELECT course_name, section, message FROM notice WHERE course_name = ? AND section = ? LIMIT ?, ?");
        $stmt->bind_param("ssii", $rowCourse['course_name'], $rowCourse['section'], $start_from, $results_per_page);
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

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM notice");

    $stmt->execute();
    $stmt->bind_result($totalRecords);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $totalRecords;
}

?>
