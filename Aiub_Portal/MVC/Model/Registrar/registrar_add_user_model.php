<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function insertUserIntoDatabase($userId, $role, $password, $phone, $email, $user_id) {
    $conn = connectToDatabase();

    $stmt_check = $conn->prepare("SELECT COUNT(*) FROM users WHERE users_id = ?");
    $stmt_check->bind_param("s", $user_id);
    $stmt_check->execute();
    $stmt_check->bind_result($count);
    $stmt_check->fetch();
    $stmt_check->close();

    if ($count > 0) {
        return "User ID already exists. Please choose a different one.";
    }

    $stmt_insert = $conn->prepare("INSERT INTO `users`(`role`, `password`, `phone`, `email`, `users_id`) VALUES (?, ?, ?, ?, ?)");
    $stmt_insert->bind_param("sssss", $role, $password, $phone, $email, $user_id);

    $stmt_insert->execute();

    $stmt_insert->close();
    $conn->close();
    return ""; 
}

function generateNewUserId() {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT MAX(users_id) AS max_id FROM users");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $maxId = $row['max_id'];

    $newUserId = $maxId + 1;

    $stmt->close();
    $conn->close();

    return $newUserId;
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

?>
