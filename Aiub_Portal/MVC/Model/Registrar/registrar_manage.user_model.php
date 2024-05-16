<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function fetchUserData($start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT * FROM users LIMIT ?, ?");
    $stmt->bind_param("ii", $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $userData = [];
    while ($row = $result->fetch_assoc()) {
        $userData[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $userData;
}

function searchUserData($searchTerm, $start_from, $results_per_page) {
    $conn = connectToDatabase();
    $searchTerm = "%" . $searchTerm . "%"; 

    $stmt = $conn->prepare("SELECT * FROM users WHERE phone LIKE ? OR email LIKE ? LIMIT ?, ?");
    $stmt->bind_param("ssii", $searchTerm, $searchTerm, $start_from, $results_per_page);

    $stmt->execute();
    $result = $stmt->get_result();

    $userData = [];
    while ($row = $result->fetch_assoc()) {
        $userData[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $userData;
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

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM users");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $totalRecords = $row['total'];

    $stmt->close();
    $conn->close();

    return $totalRecords;
}


?>
