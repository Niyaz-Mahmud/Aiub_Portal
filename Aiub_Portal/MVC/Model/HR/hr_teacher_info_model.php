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

function fetchTeachersDetails($start_from, $results_per_page)
{
    $teachers = [];
    
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT id, name, department, salary FROM teacher LIMIT ?, ?");
    $stmt->bind_param("ii", $start_from, $results_per_page);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $teachers[] = $row;
        }
        
    }

    $stmt->close();
    $conn->close();

    return $teachers;
}

function getTotalRecords()
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM teacher");
    $stmt->execute();
    $stmt->bind_result($totalRecords);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $totalRecords;
}

function searchTeachers($searchTerm, $results_per_page, $start_from)
{
    $teachers = [];
    
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT id, name, department, salary FROM teacher WHERE id LIKE ? OR name LIKE ? OR department LIKE ? OR salary LIKE ? LIMIT ?, ?");
    $searchTerm = "%$searchTerm%";
    $stmt->bind_param("ssssii", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $start_from, $results_per_page);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $teachers[] = $row;
        }
        
    }

    $stmt->close();
    $conn->close();

    return $teachers;
}

?>
