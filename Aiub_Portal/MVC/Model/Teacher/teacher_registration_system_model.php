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

function fetchAvailableCourses($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT DISTINCT course_name FROM courses WHERE (course_name, section) NOT IN (SELECT course_name, section FROM enrollments WHERE teacher_id = ?) LIMIT ?, ?");
    $stmt->bind_param("iii", $userId, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $courses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courseName = $row['course_name'];
            $courses[$courseName] = [];

            $sqlSections = $conn->prepare("SELECT course_id, section, DATE_FORMAT(start_time, '%H:%i') AS start_time, DATE_FORMAT(end_time, '%H:%i') AS end_time, day FROM courses WHERE course_name = ? AND (course_name, section) NOT IN (SELECT course_name, section FROM enrollments WHERE teacher_id = ?)");
            $sqlSections->bind_param("si", $courseName, $userId);
            $sqlSections->execute();
            $resultSections = $sqlSections->get_result();
            while ($section = $resultSections->fetch_assoc()) {
                $courses[$courseName][] = $section;
            }
        }
    }

    $stmt->close();
    $conn->close();

    return $courses;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM courses");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $row["total"];
}

function enrollCourses($userId, $enrolledCourses, $semester) {
    $conn = connectToDatabase();
    $successCount = 0;

    foreach ($enrolledCourses as $courseInfo => $value) {
        $courseInfoParts = explode(' - ', $courseInfo);
        $courseName = $courseInfoParts[0];
        $courseSection = isset($courseInfoParts[1]) ? $courseInfoParts[1] : '';

        $stmt = $conn->prepare("UPDATE enrollments SET teacher_id = ? WHERE course_name = ? AND section = ? AND semester = ?");
        $stmt->bind_param("isss", $userId, $courseName, $courseSection, $semester);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $successCount++;
        }

        $stmt->close();
    }

    $conn->close();

    if ($successCount === count($enrolledCourses)) {
        return "Courses were successfully enrolled.";
    }
}

function searchAvailableCourses($userId, $searchTerm, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $searchTerm = "%" . $searchTerm . "%";

    $sql = "SELECT DISTINCT course_name FROM courses WHERE (course_name LIKE ? OR section LIKE ?) AND (course_name, section) NOT IN (SELECT course_name, section FROM enrollments WHERE teacher_id = ?) LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiii", $searchTerm, $searchTerm, $userId, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $courses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courseName = $row['course_name'];
            $courses[$courseName] = [];

            $sqlSections = $conn->prepare("SELECT course_id, section, DATE_FORMAT(start_time, '%H:%i') AS start_time, DATE_FORMAT(end_time, '%H:%i') AS end_time, day FROM courses WHERE course_name = ? AND (course_name, section) NOT IN (SELECT course_name, section FROM enrollments WHERE teacher_id = ?)");
            $sqlSections->bind_param("si", $courseName, $userId);
            $sqlSections->execute();
            $resultSections = $sqlSections->get_result();
            while ($section = $resultSections->fetch_assoc()) {
                $courses[$courseName][] = $section;
            }
        }
    }

    $stmt->close();
    $conn->close();

    return $courses;
}

?>
