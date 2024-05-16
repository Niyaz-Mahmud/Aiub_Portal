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

function fetchDroppedCourses($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT DISTINCT student_id, course_name, section FROM drop_table WHERE teacher_id = ? LIMIT ?, ?");
    $stmt->bind_param("sii", $userId, $start_from, $results_per_page);
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

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM drop_table");
    $stmt->execute();
    $stmt->bind_result($totalRecords);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $totalRecords;
}

function searchDroppedCourses($userId, $searchTerm, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT DISTINCT student_id, course_name, section FROM drop_table WHERE teacher_id = ? AND (student_id LIKE ? OR course_name LIKE ? OR section LIKE ?) LIMIT ?, ?");

    $searchTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("ssssii", $userId, $searchTerm, $searchTerm, $searchTerm, $start_from, $results_per_page);
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

function acceptDroppedCourse($courseName, $section, $student_id) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("DELETE FROM enrollments WHERE course_name = ? AND section = ? AND student_id = ?");
    $stmt->bind_param("sss", $courseName, $section, $student_id);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM drop_table WHERE course_name = ? AND section = ? AND student_id = ?");
    $stmt->bind_param("sss", $courseName, $section, $student_id);
    $stmt->execute();
    $stmt->close();

    $conn->close();
}
?>
