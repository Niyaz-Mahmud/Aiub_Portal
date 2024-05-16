<?php

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

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function addHRToDatabase($data, $HRID, $email, $phone) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO humanresource (HRID, HRName, FatherName, MotherName, BloodGroup, Address, Religion, MaritalStatus, Email, Phone, JoiningDate, Nationality) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $HRID, $data['HRName'], $data['FatherName'], $data['MotherName'], $data['BloodGroup'], $data['Address'], $data['Religion'], $data['MaritalStatus'], $email, $phone, $data['JoiningDate'], $data['Nationality']);

    if ($stmt->execute()) {
        $message = "HR added successfully.";
    } else {
        $message = "Error adding HR: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    return $message;
}

?>
