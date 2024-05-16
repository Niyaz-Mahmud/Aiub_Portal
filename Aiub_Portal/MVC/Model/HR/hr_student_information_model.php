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

function fetchStudentFinancialDetails($start_from, $results_per_page)
{
    $conn = connectToDatabase();

    $studentFinancialDetails = [];

    $stmt = $conn->prepare("SELECT sf.Student_id, s.Student_name, s.Department, SUM(sf.Total_payment) AS total_payment, SUM(sf.dues) AS total_dues 
    FROM student_financial sf 
    INNER JOIN Student s ON sf.Student_id = s.Student_id 
    GROUP BY sf.Student_id LIMIT ?, ?");
    $stmt->bind_param("ii", $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $studentFinancialDetails[] = $row;
        }
    }

    $stmt->close();
    $conn->close();
    
    return $studentFinancialDetails;
}

function searchStudentFinancialDetails($searchTerm, $start_from, $results_per_page)
{
    $conn = connectToDatabase();

    $studentFinancialDetails = [];

    $stmt = $conn->prepare("SELECT sf.Student_id, s.Student_name, s.Department, SUM(sf.Total_payment) AS total_payment, SUM(sf.dues) AS total_dues 
    FROM student_financial sf 
    INNER JOIN Student s ON sf.Student_id = s.Student_id 
    WHERE sf.Student_id LIKE ? OR s.Student_name LIKE ? OR s.Department LIKE ? 
    GROUP BY sf.Student_id 
    LIMIT ?, ?");
    $searchTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("sssii", $searchTerm, $searchTerm, $searchTerm, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $studentFinancialDetails[] = $row;
        }
    }

    $stmt->close();
    $conn->close();
    
    return $studentFinancialDetails;
}

function getTotalRecords()
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM student_financial");
    $stmt->execute();
    $stmt->bind_result($totalRecords);
    $stmt->fetch();
    $stmt->close();

    $conn->close();
    
    return $totalRecords;
}

?>
