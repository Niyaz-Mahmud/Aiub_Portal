<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function fetchCourses($start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT course_id, course_name, section, status, capacity, count, day, start_time, end_time FROM courses LIMIT ?, ?");
    $stmt->bind_param("ii", $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $courses;
}

function searchCourses($searchTerm, $start_from, $results_per_page) {
    $conn = connectToDatabase();
    $searchTerm = "%" . $searchTerm . "%";

    $stmt = $conn->prepare("SELECT course_id, course_name, section, status, capacity, day, count, start_time, end_time FROM courses WHERE course_name LIKE ? OR section LIKE ? OR status LIKE ? OR capacity LIKE ? OR day LIKE ? OR count LIKE ? OR start_time LIKE ? OR end_time LIKE ? LIMIT ?, ?");
    
    $stmt->bind_param("ssssssssii", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $start_from, $results_per_page);

    $stmt->execute();
    $result = $stmt->get_result();

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $courses;
}

function fetchNameFromDatabase($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT RegisterName FROM register WHERE RegisterID = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($RegisterName);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $RegisterName;
}

function closeCourse($course_id) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("UPDATE courses SET status = 'Closed' WHERE course_id = ?");
    $stmt->bind_param("s", $course_id);

    if ($stmt->execute()) {
        echo "Course closed successfully";
    } else {
        echo "Error closing course: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

function openCourse($course_id) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("UPDATE courses SET status = 'Open' WHERE course_id = ?");
    $stmt->bind_param("s", $course_id);

    if ($stmt->execute()) {
        echo "Course opened successfully";
    } else {
        echo "Error opening course: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

function resetCount() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("UPDATE courses SET count = 0");
    if ($stmt->execute()) {
        echo "Count reset successfully";
    } else {
        echo "Error resetting count: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM courses");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $totalRecords = $row['total'];

    $stmt->close();
    $conn->close();

    return $totalRecords;
}

?>
