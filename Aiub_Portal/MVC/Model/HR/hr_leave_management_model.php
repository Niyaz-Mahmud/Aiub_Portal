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

function fetchLeaveDetails($start_from, $results_per_page)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT Leave_ID, name, Department, Reason, StartDate, EndDate, status FROM leave_table LIMIT ?, ?");
    $stmt->bind_param("ii", $start_from, $results_per_page);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $stmt->close();
    $conn->close();
    
    return $result;
}

function searchLeaveDetails($searchTerm, $start_from, $results_per_page)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT Leave_ID, name, Department, Reason, StartDate, EndDate, status FROM leave_table WHERE name LIKE ? OR Department LIKE ? OR Reason LIKE ? OR StartDate LIKE ? OR EndDate LIKE ? OR status LIKE ? LIMIT ?, ?");
    $searchTerm = "%$searchTerm%";
    $stmt->bind_param("ssssssii", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $start_from, $results_per_page);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $stmt->close();
    $conn->close();
    
    return $result;
}

function getTotalRecords()
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM leave_table");
    $stmt->execute();
    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $totalRecords = $row["total"];
    
    $stmt->close();
    $conn->close();
    
    return $totalRecords;
}

function updateLeaveStatus($id)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("UPDATE leave_table SET status = 'Accepted' WHERE Leave_ID = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    
    $stmt->close();
    $conn->close();
    
    return $result;
}

?>
