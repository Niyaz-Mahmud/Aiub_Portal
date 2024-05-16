<?php
$mysqli = connectToDatabase();

function connectToDatabase() {
    $mysqli = new mysqli("localhost", "root", "", "aiub_portal");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    return $mysqli;
}

function getCurrentPassword($mysqli, $users_id) {
    $password = null; 
    $stmt = $mysqli->prepare("SELECT password FROM users WHERE users_id = ?");
    $stmt->bind_param("s", $users_id);
    $stmt->execute();
    $stmt->bind_result($password);
    $stmt->fetch();
    $stmt->close();
    
    if (isset($password)) {
        return $password;
    } else {
        return false;
    }
}

function changePassword($mysqli, $users_id, $new_password) {
    $stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE users_id = ?");
    $stmt->bind_param("ss", $new_password, $users_id);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}
?>
