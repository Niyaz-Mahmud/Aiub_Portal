<?php

function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getPasswordById($users_id) {
    $conn = connectToDatabase();
    $stmt_check_password = $conn->prepare("SELECT password FROM users WHERE users_id=?");
    $stmt_check_password->bind_param("i", $users_id);
    $stmt_check_password->execute();
    $stmt_check_password->store_result();
    $stmt_check_password->bind_result($current_password);
    $stmt_check_password->fetch();
    $stmt_check_password->close();
    $conn->close();
    return $current_password;
}

function updatePasswordById($users_id, $new_password) {
    $conn = connectToDatabase();
    $stmt = $conn->prepare("UPDATE users SET password=? WHERE users_id=?");
    $stmt->bind_param("si", $new_password, $users_id);
    $stmt->execute();
    $affected_rows = $stmt->affected_rows;
    $stmt->close();
    $conn->close();
    return $affected_rows;
}

?>
