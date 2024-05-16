<?php

function connectToDatabase()
{
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function fetchNameFromDatabase($userId)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT HRName FROM humanresource WHERE HRID = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($HRName);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $HRName;
}

function fetchTeacherDetails($teacherId)
{
    $conn = connectToDatabase();

    $teachers = [];

    $stmt = $conn->prepare("SELECT * FROM teacher WHERE id = ?");
    $stmt->bind_param("s", $teacherId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $teachers[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $teachers;
}

?>
