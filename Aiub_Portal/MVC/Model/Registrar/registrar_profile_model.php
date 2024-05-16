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


function updateRegisterData($data, $register_id) {
    $mysqli = connectToDatabase();

    $stmt = $mysqli->prepare("UPDATE register SET RegisterName = ?, FatherName = ?, MotherName = ?, BloodGroup = ?, Nationality = ?, Address = ?, Sex = ?, Religion = ?, JoiningDate = ?, Phone = ?, Email = ?, LeavingDate = ?, MaritalStatus = ?, DOB = STR_TO_DATE(?, '%Y-%m-%d') WHERE RegisterID = ?");
    
    if (!$stmt) {
        $message = "Prepare failed: " . $mysqli->error;
    } else {
        $stmt->bind_param("ssssssssssssssi", $data['RegisterName'], $data['FatherName'], $data['MotherName'], $data['BloodGroup'], $data['Nationality'], $data['Address'], $data['sex'], $data['Religion'], $data['JoiningDate'], $data['Phone'], $data['Email'], $data['LeavingDate'], $data['MaritalStatus'], $data['dob'], $register_id);
        
        if (!$stmt->execute()) {
            $message = "Execute failed: " . $stmt->error;
        } else {
            if ($stmt->affected_rows > 0) {
                $message = "Register data updated successfully.";
            } else {
                $message = "No records updated.";
            }
        }

        $stmt->close();
    }

    $mysqli->close();

    return $message;
}


function getRegisterInfo($registerId) {
    $mysqli = connectToDatabase();

    $stmt = $mysqli->prepare("SELECT RegisterID, RegisterName, FatherName, MotherName, DOB, Sex, Address, Religion, MaritalStatus, Nationality, BloodGroup, Email, Phone, JoiningDate, LeavingDate FROM register WHERE RegisterID = ?");
    
    $stmt->bind_param("s", $registerId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $stmt->close();
        $mysqli->close();
        return null;
    }

    $registerInfo = $result->fetch_assoc();

    $stmt->close();
    $mysqli->close();

    return $registerInfo;
}
?>
