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
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $name;
}

function updatePaymentInDatabase($paymentId, $userId, $amountToPay) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("UPDATE student_financial SET Total_payment = COALESCE(Total_payment, 0) + ?, Dues = Dues - ? WHERE id = ? AND Student_id = ?");
    $stmt->bind_param("ddii", $amountToPay, $amountToPay, $paymentId, $userId);
    $stmt->execute();
    
  
    
    $stmt->close();
    $conn->close();
}

?>
