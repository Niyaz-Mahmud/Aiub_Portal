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

    $stmt = $conn->prepare("SELECT student_name FROM student WHERE student_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $name;
}

function enrollCourses($userId, $enrolledCourses, $semester) {
    $conn = connectToDatabase();

    foreach ($enrolledCourses as $courseInfo => $value) {

        $courseInfoParts = explode(' - ', $courseInfo);
        $courseName = $courseInfoParts[0];
        $courseSection = isset($courseInfoParts[1]) ? $courseInfoParts[1] : '';

        $stmt = $conn->prepare("SELECT course_id FROM courses WHERE course_name = ? AND section = ?");
        $stmt->bind_param("ss", $courseName, $courseSection);
        $stmt->execute();
        $stmt->bind_result($courseId);
        $stmt->fetch();
        $stmt->close();

        $stmt_increment_count = $conn->prepare("UPDATE courses SET count = count + 1 WHERE course_name = ? AND section = ?");
        $stmt_increment_count->bind_param("ss", $courseName, $courseSection);
        $stmt_increment_count->execute();
        $stmt_increment_count->close();

        $stmt = $conn->prepare("INSERT INTO enrollments (student_id, course_id, course_name, semester, section) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $userId, $courseId, $courseName, $semester, $courseSection);
        $stmt->execute();
        $stmt->close();
    }

    $Dues = 16500 * count($enrolledCourses);

    $stmt_payment = $conn->prepare("INSERT INTO student_financial (Student_id, Dues) VALUES (?, ?)");
    $stmt_payment->bind_param("ii", $userId, $Dues);
    $stmt_payment->execute();
    $stmt_payment->close();

    mysqli_close($conn);
}

function fetchAvailableCourses($userId, $start_from, $results_per_page) {

    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT DISTINCT c.course_name 
                            FROM courses c
                            WHERE 
                            c.course_name NOT IN (
                                SELECT e.course_name 
                                FROM enrollments e 
                                WHERE e.student_id = ?
                            )LIMIT ?, ?");

    $stmt->bind_param("iii", $userId, $start_from, $results_per_page);
    $stmt->execute();

    $result = $stmt->get_result();

    $availableCourses = [];

    while ($row = $result->fetch_assoc()) {
        $availableCourses[] = $row['course_name'];
    }

    $stmt->close();
    $conn->close();

    return $availableCourses;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM courses");

    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $totalRecords);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $totalRecords;
}

function fetchCoursesByCourseName($courseName) {
    $conn = connectToDatabase();
    $sql_courses = $conn->prepare("SELECT course_id, course_name, section, DATE_FORMAT(start_time, '%H:%i') AS start_time, DATE_FORMAT(end_time, '%H:%i') AS end_time, day FROM courses WHERE course_name = ? AND count < 40");
    $sql_courses->bind_param("s", $courseName);
    $sql_courses->execute();
    $result_courses = $sql_courses->get_result();
    $courses = [];

    while ($course = $result_courses->fetch_assoc()) {
        $courses[] = $course;
    }

    $sql_courses->close();
    $conn->close();

    return $courses;
}

function searchCoursesByName($searchTerm, $userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT DISTINCT c.course_name 
                            FROM courses c
                            WHERE 
                            c.course_name NOT IN (
                                SELECT e.course_name 
                                FROM enrollments e 
                                WHERE e.student_id = ?
                            ) AND c.course_name LIKE ? LIMIT ?, ?");
    $searchTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("issi", $userId, $searchTerm, $start_from, $results_per_page);
    $stmt->execute();

    $result = $stmt->get_result();

    $availableCourses = [];

    while ($row = $result->fetch_assoc()) {
        $availableCourses[] = $row['course_name'];
    }

    $stmt->close();
    $conn->close();

    return $availableCourses;
}

?>

