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

function fetchPaymentsFromDatabase($userId, $start_from, $results_per_page) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT Month, Salary, Bonus, Total_salary FROM payment WHERE Employee_id = ? LIMIT ?, ? ");
    $stmt->bind_param("sii", $userId, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    $payments = $result->fetch_all(MYSQLI_ASSOC);

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
    $totalRecords = $row['total'];

    $stmt->close();
    $conn->close();

    return $totalRecords;
}


?>
