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

    $stmt = $conn->prepare("SELECT RegisterName FROM register WHERE RegisterID = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($RegisterName);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $RegisterName;
}

function searchLeaveDetails($userId, $searchTerm, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $searchTerm = '%' . $searchTerm . '%';

    $stmt = $conn->prepare("SELECT Leave_ID, name, Department, Reason, StartDate, EndDate, status FROM leave_table WHERE EmployeeID = ? AND (name LIKE ? OR Department LIKE ? OR Reason LIKE ?) LIMIT ?, ?");
    $stmt->bind_param("ssssii", $userId, $searchTerm, $searchTerm, $searchTerm, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    return $result;
}

function fetchLeaveDetails($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT Leave_ID, name, Department, Reason, StartDate, EndDate, status FROM leave_table WHERE EmployeeID = ? LIMIT ?, ?");
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
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $totalRecords = $row['total'];

    $stmt->close();
    $conn->close();

    return $totalRecords;
}

?>
