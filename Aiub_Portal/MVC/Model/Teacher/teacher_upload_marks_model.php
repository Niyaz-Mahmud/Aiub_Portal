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

    $stmt = $conn->prepare("SELECT name FROM teacher WHERE id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $name;
}

function fetchStudentName($studentId) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT student_name FROM student WHERE student_id = ?");
    $stmt->bind_param("s", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $student_name = $row['student_name'];
    $stmt->close();
    return $student_name;
}

function fetchGradesFromDatabase($userId, $studentId, $course, $section) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT * FROM grade WHERE teacher_id = ? AND student_id = ? AND course_name = ? AND section = ?");
    $stmt->bind_param("ssss", $userId, $studentId, $course, $section);
    $stmt->execute();
    $result = $stmt->get_result();
    $grades = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    return $grades;
}

function uploadGradesToDatabase($userId, $studentId, $course, $section, $semester, $mid_quiz1, $mid_quiz2, $mid_best_quiz, $mid_attendance, $mid_written, $mid_grade, $mid_assignment, $final_quiz1, $final_quiz2, $final_best_quiz, $final_attendance, $final_written, $final_grade, $final_assignment, $total_grade) {
    $conn = connectToDatabase();

    $teacher_name = fetchNameFromDatabase($userId);
    $student_name = fetchStudentName($studentId);
    $grades = fetchGradesFromDatabase($userId, $studentId, $course, $section);

    if (empty($grades)) {
        $stmt = $conn->prepare("INSERT INTO grade (teacher_id, teacher_name, student_id, student_name, course_name, section, semester, mid_quiz1, mid_quiz2, mid_best_quiz, mid_attendance, mid_written, mid_grade, mid_assignment, final_quiz1, final_quiz2, final_best_quiz, final_attendance, final_written, final_grade, final_assignment, total_grade) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssssssssss", $userId, $teacher_name, $studentId, $student_name, $course, $section, $semester, $mid_quiz1, $mid_quiz2, $mid_best_quiz, $mid_attendance, $mid_written, $mid_grade, $mid_assignment, $final_quiz1, $final_quiz2, $final_best_quiz, $final_attendance, $final_written, $final_grade, $final_assignment, $total_grade);
    } else {
        $stmt = $conn->prepare("UPDATE grade SET mid_quiz1=?, mid_quiz2=?, mid_best_quiz=?, mid_attendance=?, mid_written=?, mid_grade=?, mid_assignment=?, final_quiz1=?, final_quiz2=?, final_best_quiz=?, final_attendance=?, final_written=?, final_grade=?, final_assignment=?, total_grade=?, teacher_name=?, student_name=? WHERE teacher_id=? AND student_id=? AND course_name=? AND section=? AND semester=?");
        $stmt->bind_param("ssssssssssssssssssssss", $mid_quiz1, $mid_quiz2, $mid_best_quiz, $mid_attendance, $mid_written, $mid_grade, $mid_assignment, $final_quiz1, $final_quiz2, $final_best_quiz, $final_attendance, $final_written, $final_grade, $final_assignment, $total_grade, $teacher_name, $student_name, $userId, $studentId, $course, $section, $semester);
    }

    $stmt->execute();
    $stmt->close();
}

?>
