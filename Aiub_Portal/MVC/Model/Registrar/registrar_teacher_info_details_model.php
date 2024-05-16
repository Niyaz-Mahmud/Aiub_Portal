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

function updateTeacher($formData) {
    $mysqli = connectToDatabase();

    $stmt = $mysqli->prepare("UPDATE teacher SET name = ?, fathername = ?, mothername = ?, dob = ?, sex = ?, address = ?, religion = ?, marital_status = ?, nationality = ?, blood_group = ?, email = ?, phone = ?, joining_date = ?, leaving_date = ?, department = ? WHERE id = ?");

    $stmt->bind_param("sssssssssssssssi", $formData['name'], $formData['fathername'], $formData['mothername'], $formData['dob'], $formData['sex'], $formData['address'], $formData['religion'], $formData['marital_status'], $formData['nationality'], $formData['blood_group'], $formData['email'], $formData['phone'], $formData['joining_date'], $formData['leaving_date'], $formData['department'], $formData['id']);

    $stmt->execute();

    $message = ($stmt->affected_rows > 0) ? "Teacher data updated successfully." : "No records updated.";

    $stmt->close();
    $mysqli->close();

    return $message;
}

function fetchTeacherInfo($teacher_id) {
    $mysqli = connectToDatabase();

    $stmt = $mysqli->prepare("SELECT id, name, fathername, mothername, dob, sex, address, religion, marital_status, nationality, blood_group, email, phone, joining_date, leaving_date, department FROM teacher WHERE id = ?");

    $stmt->bind_param("s", $teacher_id);

    $stmt->execute();

    $result = $stmt->get_result();

    $teacher_info = $result->fetch_assoc();

    $stmt->close();
    $mysqli->close();

    return $teacher_info ? $teacher_info : [];
}

?>
