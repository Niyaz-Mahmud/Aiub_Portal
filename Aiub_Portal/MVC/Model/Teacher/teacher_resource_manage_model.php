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

function fetchResourcesFromDatabase($teachersID, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT CourseName, Section, Content FROM resource WHERE TeacherID = ? LIMIT ?, ?");
    $stmt->bind_param("iii", $teachersID, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $resources = array();
    while ($row = $result->fetch_assoc()) {
        $resources[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $resources;
}

function searchResourcesFromDatabase($teachersID, $searchTerm, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT CourseName, Section, Content FROM resource WHERE TeacherID = ? AND (CourseName LIKE ? OR Section LIKE ? OR Content LIKE ?) LIMIT ?, ?");
    $searchTerm = "%$searchTerm%";
    $stmt->bind_param("isssii", $teachersID, $searchTerm, $searchTerm, $searchTerm, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $resources = array();
    while ($row = $result->fetch_assoc()) {
        $resources[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $resources;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM resource");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $row['total'];
}

?>
