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
    $stmt->bind_result($registerName);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $registerName;
}

function insertIntoLibraryResource($name, $author, $category) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO libraryresource (Name, Author, Category, Availability) VALUES (?, ?, ?, 'Available')");
    $stmt->bind_param("sss", $name, $author, $category);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

?>
