<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Dashboard</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../view/Styles.css">
</head>
<body>
    <div class="dashboard-header">
        <!-- Logo container -->
        <div class="logo-container">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <!-- University information -->
            <div class="university-info">
                <div class="university-name">AIUB</div>
                <div class="tagline">Portal</div>
            </div>
        </div>
        <!-- Icons container -->
        <div class="icons-container">
            <?php if(isset($welcomeMessage)): ?>
                <!-- Welcome message -->
                <a href="registrar_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
            <?php endif; ?>
            <!-- Setting link -->
            <a href="#" class="setting-link"><i class="fas fa-cog icon"></i></a>
            <!-- Logout link -->
            <a href="?logout=true" class="logout-link"><i class="fas fa-sign-out-alt icon"></i> Logout</a>
        </div>
    </div>
    <!-- Settings menu -->
    <div class="settings-menu" id="settings-menu">
        <ul>
            <!-- Change password link -->
            <li><a href="../changepass_controller.php?users_id=<?php echo htmlentities($userId); ?>">Change Password</a></li>
        </ul>
    </div>
    <div class="dashboard-content">
        <div class="menu-options">
            <!-- Navigation links -->
            <a href="registrar_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
            <a href="registrar_student_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_student_info' ? 'active' : ''; ?>"><i class="fas fa-user menu-icon"></i> Student Records</a>
            <a href="registrar_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Records</a>
            <a href="registrar_course_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_course_management' ? 'active' : ''; ?>"><i class="fas fa-book menu-icon"></i> Manage Courses</a>
            <a href="registrar_manage.user_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-users menu-icon"></i> Manage User</a>
            <a href="registrar_manage_library_resource_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_manage_library_resource' ? 'active' : ''; ?>"><i class="fas fa-book-open menu-icon"></i> Library Resource</a>
            <a href="registrar_leave_status_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_leave_status' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Apply Leave</a>
            <a href="registrar_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_payment' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payment</a>
        </div>

    <div class="container">
        <!-- Register information table -->
        <table class="register-info-table">
                <?php if(isset($message)): ?>
                    <!-- Success Message -->
                    <div class="success-message">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
            <tr>
                <th colspan="3">Register Information</th>
            </tr>
            <?php if (!empty($registerInfo)): ?>
                <form method='post' action=''>
                    <tr>
                        <td><strong>ID</strong></td><td>:</td><td><span id='id'><?php echo $registerInfo['RegisterID']; ?></span></td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td><td>:</td><td><input type='text' name='RegisterName' value='<?php echo $registerInfo['RegisterName']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Father's Name</strong></td><td>:</td><td><input type='text' name='FatherName' value='<?php echo $registerInfo['FatherName']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Mother's Name</strong></td><td>:</td><td><input type='text' name='MotherName' value='<?php echo $registerInfo['MotherName']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>DOB</strong></td><td>:</td><td><input type='date' name='dob' value='<?php echo $registerInfo['DOB']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Sex</strong></td><td>:</td><td>
                            <select name='sex'>
                                <option value='Male' <?php if ($registerInfo['Sex'] === 'Male') echo 'selected'; ?>>Male</option>
                                <option value='Female' <?php if ($registerInfo['Sex'] === 'Female') echo 'selected'; ?>>Female</option>
                                <option value='Other' <?php if ($registerInfo['Sex'] === 'Other') echo 'selected'; ?>>Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td><td>:</td><td><input type='text' name='Address' value='<?php echo $registerInfo['Address']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Religion</strong></td><td>:</td><td>
                            <select name='Religion'>
                                <option value='Christian' <?php if ($registerInfo['Religion'] === 'Christian') echo 'selected'; ?>>Christian</option>
                                <option value='Muslim' <?php if ($registerInfo['Religion'] === 'Muslim') echo 'selected'; ?>>Muslim</option>
                                <option value='Hindu' <?php if ($registerInfo['Religion'] === 'Hindu') echo 'selected'; ?>>Hindu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Marital Status</strong></td><td>:</td><td>
                            <select name='MaritalStatus'>
                                <option value='Single' <?php if ($registerInfo['MaritalStatus'] === 'Single') echo 'selected'; ?>>Single</option>
                                <option value='Married' <?php if ($registerInfo['MaritalStatus'] === 'Married') echo 'selected'; ?>>Married</option>
                                <option value='Divorced' <?php if ($registerInfo['MaritalStatus'] === 'Divorced') echo 'selected'; ?>>Divorced</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Nationality</strong></td><td>:</td><td><input type='text' name='Nationality' value='<?php echo $registerInfo['Nationality']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Blood Group</strong></td><td>:</td><td>
                            <select name='BloodGroup'>
                                <option value='A+' <?php if ($registerInfo['BloodGroup'] === 'A+') echo 'selected'; ?>>A+</option>
                                <option value='A-' <?php if ($registerInfo['BloodGroup'] === 'A-') echo 'selected'; ?>>A-</option>
                                <option value='B+' <?php if ($registerInfo['BloodGroup'] === 'B+') echo 'selected'; ?>>B+</option>
                                <option value='B-' <?php if ($registerInfo['BloodGroup'] === 'B-') echo 'selected'; ?>>B-</option>
                                <option value='AB+' <?php if ($registerInfo['BloodGroup'] === 'AB+') echo 'selected'; ?>>AB+</option>
                                <option value='AB-' <?php if ($registerInfo['BloodGroup'] === 'AB-') echo 'selected'; ?>>AB-</option>
                                <option value='O+' <?php if ($registerInfo['BloodGroup'] === 'O+') echo 'selected'; ?>>O+</option>
                                <option value='O-' <?php if ($registerInfo['BloodGroup'] === 'O-') echo 'selected'; ?>>O-</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td><td>:</td><td><input type='text' name='Phone' value='<?php echo $registerInfo['Phone']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td><td>:</td><td><input type='text' name='Email' value='<?php echo $registerInfo['Email']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Joining Date</strong></td><td>:</td><td><input type='date' name='JoiningDate' value='<?php echo $registerInfo['JoiningDate']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Leaving Date</strong></td><td>:</td><td><input type='date' name='LeavingDate' value='<?php echo $registerInfo['LeavingDate']; ?>'></td>
                    </tr>
                    <input type='hidden' name='id' value='<?php echo $registerInfo['id']; ?>'>
                    <tr><td colspan='3'><button type='submit' name='submit' class='upload-button'>Update</button></td></tr>
                </form>
            <?php else: ?>
                <tr><td colspan='3'>No registrar ID specified in the URL.</td></tr>
            <?php endif; ?>
        </table>

    </div>

    <!-- JavaScript -->
    <script src="../../View/index.js"></script>

</body>
</html>
