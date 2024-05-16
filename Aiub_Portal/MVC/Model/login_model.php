<?php
function connectToDatabase() {
    $conn = new mysqli("localhost", "root", "", "aiub_portal");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getUser($users_id) {
    $conn = connectToDatabase();

    $sql = "SELECT users_id, password, role FROM users WHERE users_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $users_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $user = null;

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $db_users_id, $db_password, $user_role);
        mysqli_stmt_fetch($stmt);
        $user = [
            "users_id" => $db_users_id,
            "password" => $db_password,
            "role" => $user_role
        ];
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $user;
}

?>
