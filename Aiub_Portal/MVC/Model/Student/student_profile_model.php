<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
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

function fetchNameFromDatabase($userId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT student_name FROM student WHERE student_id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $name;
}

function fetchCourseInfo($studentId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT course_name, mid_grade, final_grade, total_grade, semester FROM grade WHERE student_id = ?");
    $stmt->bind_param("s", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    $courseInfo = array();

    while ($row = $result->fetch_assoc()) {
        $courseInfo[] = array(
            'course_name' => $row['course_name'],
            'mid_grade' => $row['mid_grade'],
            'final_grade' => $row['final_grade'],
            'total_grade' => $row['total_grade'],
            'semester' => $row['semester']
        );
    }

    $stmt->close();
    $conn->close();

    return $courseInfo;
}

?>
