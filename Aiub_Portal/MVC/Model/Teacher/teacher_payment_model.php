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

function fetchPaymentsFromDatabase($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT Month, Salary, Bonus, Total_salary FROM payment WHERE Employee_id = ? LIMIT ?, ?");
    $stmt->bind_param("sii", $userId, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $payments = [];
    while ($row = $result->fetch_assoc()) {
        $payments[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $payments;
}

function getTotalRecords() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM payment");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $row["total"];
}
?>
