<?php
function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getUserById($conn, $users_id) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE users_id=?");
    $stmt->bind_param("s", $users_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

?>
