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

function fetchGradesFromDatabase($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT * FROM grade WHERE student_id = ?");
    $stmt->bind_param("s", $userId);
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

function fetchCoursesFromDatabase($userId, $semester = NULL) {
    $conn = connectToDatabase();

    if ($semester == NULL) {
        $stmt = $conn->prepare("SELECT DISTINCT course_name, section FROM enrollments WHERE student_id = ?");
        $stmt->bind_param("s", $userId);
    } else {
        $stmt = $conn->prepare("SELECT DISTINCT course_name, section FROM enrollments WHERE student_id = ? AND semester = ?");
        $stmt->bind_param("ss", $userId, $semester);
    }
    
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
