<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function fetchTeachersFromDatabase($start_from, $results_per_page) {
    $conn = connectToDatabase();
    $teachers = [];

    $stmt = $conn->prepare("SELECT id, name, department, leaving_date FROM teacher LIMIT ?, ?");

    $stmt->bind_param("ii", $start_from, $results_per_page);

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $teachers[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $teachers;
}

function searchTeachers($searchQuery, $start_from, $results_per_page) {
    $conn = connectToDatabase();
    $teachers = [];

    $searchQuery = "%" . $searchQuery . "%"; 
    $stmt = $conn->prepare("SELECT id, name, department, leaving_date FROM teacher WHERE name LIKE ? OR department LIKE ? LIMIT ?, ?");
    $stmt->bind_param("ssii", $searchQuery, $searchQuery, $start_from, $results_per_page);

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $teachers[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $teachers;
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

function leaveTeacher($teacherId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("UPDATE teacher SET leaving_date = CURRENT_DATE() WHERE id = ?");
    $stmt->bind_param("i", $teacherId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM teacher");

    $stmt->execute();
    $stmt->bind_result($totalRecords);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $totalRecords;
}

?>
