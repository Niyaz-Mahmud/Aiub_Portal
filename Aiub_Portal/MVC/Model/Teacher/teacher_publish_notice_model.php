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

function fetchNoticesFromDatabase($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT course_name, section, message FROM notice WHERE teacher_id = ? LIMIT ?, ?");
    $stmt->bind_param("sii", $userId, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $notices = [];
    while ($row = $result->fetch_assoc()) {
        $notices[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $notices;
}

function searchNotices($userId, $searchTerm, $results_per_page, $start_from) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT course_name, section, message FROM notice WHERE teacher_id = ? AND (course_name LIKE ? OR section LIKE ? OR message LIKE ?) LIMIT ?, ?");
    $searchPattern = "%" . $searchTerm . "%";
    $stmt->bind_param("ssssii", $userId, $searchPattern, $searchPattern, $searchPattern, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $notices = [];
    while ($row = $result->fetch_assoc()) {
        $notices[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $notices;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM notice");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $row["total"];
}
?>
