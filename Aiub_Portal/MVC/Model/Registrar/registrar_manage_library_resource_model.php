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
    $stmt->bind_result($RegisterName);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $RegisterName;
}

function searchLibraryResources($searchTerm, $start_from, $results_per_page) {
    $conn = connectToDatabase();
    $resources = [];
   
    $searchTerm = '%' . $searchTerm . '%';

    $stmt = $conn->prepare("SELECT ResourceID, Name, Availability, Author, Category, StudentName FROM LibraryResource WHERE Name LIKE ? OR Availability LIKE ? OR Author LIKE ? OR Category LIKE ? OR StudentName LIKE ? LIMIT ?, ?");
    $stmt->bind_param("sssssii", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $start_from, $results_per_page);
    $stmt->execute();

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $resources[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $resources;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM libraryresource");
    $stmt->execute();
    $stmt->bind_result($totalRecords);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $totalRecords;
}

function updateResourceAvailability($resourceId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("UPDATE LibraryResource SET Availability = 'Available', StudentID = NULL, StudentName = NULL WHERE ResourceID = ?");
    $stmt->bind_param("i", $resourceId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}


function fetchLibraryResources($start_from, $results_per_page) {
    $conn = connectToDatabase();
   
    $stmt = $conn->prepare("SELECT ResourceID, Name, Availability, Author, Category, StudentName FROM libraryresource LIMIT ?, ?");

    $stmt->bind_param("ii", $start_from, $results_per_page);

    $stmt->execute();

    $result = $stmt->get_result();
    $resources = [];

    while ($row = $result->fetch_assoc()) {
        $resources[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $resources;
}

?>
