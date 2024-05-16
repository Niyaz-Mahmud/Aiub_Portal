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
    $stmt->bind_result($registerName);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $registerName;
}

function updateLibraryResource($studentId, $studentName, $resourceId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("UPDATE libraryresource SET StudentID=?, StudentName=?, Availability='Unavailable' WHERE ResourceID=?");

    $stmt->bind_param("isi", $studentId, $studentName, $resourceId);
    $success = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $success;
}

function fetchStudentName($studentId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT Student_name FROM student WHERE Student_id = ?");
    $stmt->bind_param("s", $studentId);
    $stmt->execute();

    $stmt->bind_result($studentName);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $studentName;
}

?>
