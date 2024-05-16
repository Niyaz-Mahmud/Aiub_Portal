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

function fetchLeaveDetailsFromDatabase($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT Leave_ID, name, Department, Reason, StartDate, EndDate, status FROM leave_table where EmployeeID = ? LIMIT ? , ?");
    $stmt->bind_param("sii", $userId, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    return $result;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM leave_table");

    $stmt->execute();
    $stmt->bind_result($totalRecords);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $totalRecords;
}
?>
