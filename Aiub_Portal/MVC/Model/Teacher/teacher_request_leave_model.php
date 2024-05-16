<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function fetchUserInfoFromDatabase($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT name, department FROM teacher WHERE id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($name, $department);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return array("name" => $name, "department" => $department);
}

function insertLeaveRequest($userId, $reason, $start_date, $end_date) {
    $conn = connectToDatabase();

    $employeeType = "teacher";
    $status = "pending";

    $userInfo = fetchUserInfoFromDatabase($userId);
    $name = $userInfo['name'];
    $department = $userInfo['department'];

    $stmt = $conn->prepare("INSERT INTO leave_table (EmployeeID, EmployeeType, Reason, StartDate, EndDate, status, name, Department) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $userId, $employeeType, $reason, $start_date, $end_date, $status, $name, $department);
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();

    return $success;
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

?>
