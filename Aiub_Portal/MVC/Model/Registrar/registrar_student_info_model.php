<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function fetchStudentData($start_from, $results_per_page) {
    $mysqli = connectToDatabase();

    $stmt = $mysqli->prepare("SELECT Student_id, Student_name, Department, Admission_date FROM Student LIMIT ?, ?");

    $stmt->bind_param("ii", $start_from, $results_per_page);

    $stmt->execute();

    $result = $stmt->get_result();

    $students = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    $mysqli->close();

    return $students;
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

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM student");
    $stmt->execute();
    $stmt->bind_result($totalRecords);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $totalRecords;
}

function searchStudentData($searchTerm, $start_from, $results_per_page) {
    $mysqli = connectToDatabase();

    $stmt = $mysqli->prepare("SELECT Student_id, Student_name, Department, Admission_date FROM Student WHERE Student_id LIKE ? OR Student_name LIKE ? OR Department LIKE ? LIMIT ?, ?");

    $search = "%$searchTerm%";
    $stmt->bind_param("sssii", $search, $search, $search, $start_from, $results_per_page);

    $stmt->execute();

    $result = $stmt->get_result();

    $students = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    $mysqli->close();

    return $students;
}

?>
