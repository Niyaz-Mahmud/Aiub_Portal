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

function fetchStudentInfo($studentId) {
    $mysqli = connectToDatabase();

    $stmt = $mysqli->prepare("SELECT student_id, student_name, father_name, mother_name, dob, sex, address, religion, marital_status, nationality, blood_group, email, phone, admission_date, graduation_date, department FROM Student WHERE student_id = ?");

    $stmt->bind_param("s", $studentId);
    $stmt->execute();

    $result = $stmt->get_result();
    $student_info = $result->fetch_assoc();

    $stmt->close();
    $mysqli->close();

    return $student_info ? $student_info : [];
}

function updateStudentInfo($formData) {
    $mysqli = connectToDatabase();

    $stmt = $mysqli->prepare("UPDATE Student SET Student_name = ?, Blood_group = ?, Father_name = ?, Mother_name = ?, Department = ?, Address = ?, Nationality = ?, Sex = ?,  Religion = ?, DOB = ?, Marital_status = ?, Admission_date = ?, Phone = ?, Email = ?, Graduation_date = ? WHERE Student_id = ?");

    $stmt->bind_param("sssssssssssssssi", $formData['student_name'], $formData['blood_group'], $formData['father_name'], $formData['mother_name'], $formData['department'], $formData['address'], $formData['nationality'], $formData['sex'], $formData['religion'], $formData['dob'], $formData['marital_status'], $formData['admission_date'], $formData['phone'], $formData['email'], $formData['graduation_date'], $formData['student_id']);

    $stmt->execute();

    $message = ($stmt->affected_rows > 0) ? "Student data updated successfully." : "No records updated.";

    $stmt->close();
    $mysqli->close();

    return $message;
}

?>
