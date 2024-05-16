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

    $stmt = $conn->prepare("SELECT student_name FROM student WHERE student_id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $name;
}

function fetchStudentFinancialDetails($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT sf.Id, sf.Student_id, s.Student_name, s.Department, sf.Total_payment, sf.dues 
    FROM student_financial sf 
    INNER JOIN Student s ON sf.Student_id = s.Student_id WHERE sf.Student_id = ? LIMIT ?, ?");

    $stmt->bind_param("sii", $userId, $start_from, $results_per_page);

    $stmt->execute();

    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    return $result;
}

function getTotalRecords($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM student_financial WHERE Student_id = ?");

    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $totalRecords = $result->fetch_assoc()['total'];

    $stmt->close();
    $conn->close();

    return $totalRecords;
}

?>

