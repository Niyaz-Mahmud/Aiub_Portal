<?php

function connectToDatabase()
{
    $conn = new mysqli("localhost", "root", "", "aiub_portal");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

function fetchHRInfo($userId)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT * FROM humanresource WHERE HRID = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $hrInfo = $result->fetch_assoc();
    
    $stmt->close();
    $conn->close();
    
    return $hrInfo;
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
