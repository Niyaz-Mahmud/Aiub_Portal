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
    $result = $stmt->get_result();
    $RegisterName = null;
    if ($row = $result->fetch_assoc()) {
        $RegisterName = $row['RegisterName'];
    }

    $stmt->close();
    $conn->close();

    return $RegisterName;
}

function fetchUserDetails($userId, $id) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $user = null;
    if ($row = $result->fetch_assoc()) {
        $user = $row;
    }

    $stmt->close();
    $conn->close();

    return $user;
}

function updateUser($id, $role, $password, $email, $phone) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("UPDATE users SET role=?, password=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("ssssi", $role, $password, $email, $phone, $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

function deleteUser($id) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

?>
