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
    
    $stmt = $conn->prepare("SELECT HRName FROM humanresource WHERE HRID = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($HRName);
    $stmt->fetch();
    
    $stmt->close();
    $conn->close();
    
    return $HRName;
}

function insertPayrollData($employeeId, $name, $month, $salary, $bonus, $totalSalary) {
    $conn = connectToDatabase();
    
    $stmt = $conn->prepare("INSERT INTO payment (Employee_id, Name, Month, Salary, Bonus, Total_salary) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $employeeId, $name, $month, $salary, $bonus, $totalSalary);
    
    if ($stmt->execute()) {
        header("Location: hr_payroll_process_controller.php?users_id=" . $_SESSION['users_id']);
        exit;
    }
    
    $stmt->close();
    $conn->close();
}

?>
