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

function addTeacherToDatabase($data, $id, $email, $phone) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO teacher (id, name, fathername, mothername, dob, sex, address, religion, marital_status, nationality, blood_group, email, phone, joining_date, department, salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssss", $id, $data['name'], $data['fathername'], $data['mothername'], $data['dob'], $data['sex'], $data['address'], $data['religion'], $data['marital_status'], $data['nationality'], $data['blood_group'], $email, $phone, $data['joining_date'], $data['department'], $data['salary']);

    if ($stmt->execute()) {
        $message = "Teacher added successfully.";
    } else {
        $message = "Error adding teacher: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    return $message;
}

?>
