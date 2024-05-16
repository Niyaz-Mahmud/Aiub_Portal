<?php

function connectToDatabase()
{
    $conn = new mysqli("localhost", "root", "", "aiub_portal");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

function fetchRegisterInfoFromDatabase($start_from, $results_per_page)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT RegisterID, RegisterName, salary FROM `register` LIMIT ?, ?");
    $stmt->bind_param("ii", $start_from, $results_per_page);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $registerInfo = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $registerInfo[] = $row;
        }
    }
    
    $stmt->close();
    $conn->close();
    
    return $registerInfo;
}

function fetchTeacherInfoFromDatabase($start_from, $results_per_page)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT id, name, salary FROM `teacher` LIMIT ?, ?");
    $stmt->bind_param("ii", $start_from, $results_per_page);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $teacherInfo = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $teacherInfo[] = $row;
        }
    }
    
    $stmt->close();
    $conn->close();
    
    return $teacherInfo;
}

function getTotalRecords()
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT (SELECT COUNT(*) FROM teacher) + (SELECT COUNT(*) FROM register) AS total");
    $stmt->execute();
    
    $stmt->bind_result($totalRecords);
    $stmt->fetch();
    
    $stmt->close();
    $conn->close();
    
    return $totalRecords;
}

function searchRegisterInfo($searchTerm)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT RegisterID, RegisterName, salary FROM `register` WHERE RegisterID LIKE ? OR RegisterName LIKE ? OR salary LIKE ?");
    $searchTerm = "%$searchTerm%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $registerInfo = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $registerInfo[] = $row;
        }
    }
    
    $stmt->close();
    $conn->close();
    
    return $registerInfo;
}

function searchTeacherInfo($searchTerm)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT id, name, department, salary FROM `teacher` WHERE id LIKE ? OR name LIKE ? OR department LIKE ? OR salary LIKE ?");
    $searchTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $teacherInfo = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $teacherInfo[] = $row;
        }
    }
    
    $stmt->close();
    $conn->close();
    
    return $teacherInfo;
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

?>
