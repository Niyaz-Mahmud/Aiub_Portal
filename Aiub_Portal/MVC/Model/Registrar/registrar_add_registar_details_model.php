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

function addRegistrarToDatabase($data, $user_Id, $email, $phone) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO register (RegisterID, RegisterName, FatherName, MotherName, BloodGroup, Nationality, Address, Sex, Religion, JoiningDate, Phone, Email, MaritalStatus, DOB, salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssss", $user_Id, $data['RegisterName'], $data['FatherName'], $data['MotherName'], $data['BloodGroup'], $data['Nationality'], $data['Address'], $data['Sex'], $data['Religion'], $data['JoiningDate'], $phone, $email, $data['MaritalStatus'], $data['DOB'], $data['salary']);

    if ($stmt->execute()) {
        $message = "Registrar added successfully.";
    } else {
        $message = "Error adding registrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    return $message;
}

?>
