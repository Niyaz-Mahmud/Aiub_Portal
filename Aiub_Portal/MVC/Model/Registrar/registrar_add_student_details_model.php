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

function addStudentToDatabase($data, $user_Id, $email, $phone) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO student (Student_id, Student_name, Blood_group, Father_name, Mother_name, Department, Address, Nationality, Sex, Religion, DOB, Marital_status, Admission_date, Email, Phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssss", $user_Id, $data['student_name'], $data['blood_group'], $data['father_name'], $data['mother_name'], $data['department'], $data['address'], $data['nationality'], $data['sex'], $data['religion'], $data['dob'], $data['marital_status'], $data['admission_date'], $email, $phone);

    if ($stmt->execute()) {
        $message = "Student added successfully.";
    } else {
        $message = "Error adding student: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    return $message;
}

?>
