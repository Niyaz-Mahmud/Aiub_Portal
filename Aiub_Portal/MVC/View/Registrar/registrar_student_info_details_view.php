<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Student Dashboard</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../view/Styles.css"> <!-- Link to common styles -->
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
        <a href="registrar_manage.user_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-users menu-icon"></i>Manage User</a>
        <a href="registrar_manage_library_resource_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_manage_library_resource' ? 'active' : ''; ?>"><i class="fas fa-book-open menu-icon"></i> Library Resource</a>
        <a href="registrar_leave_status_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_leave_status' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Apply Leave</a>
        <a href="registrar_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_payment' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payment</a>
    </div>

    <div class="container">
        <!-- Student information table -->
        <table class="Student-info-table">
            <?php if(isset($message)): ?>
                <!-- Success message -->
                <div class="success-message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <tr>
                <th colspan="3">Student Information</th>
            </tr>
            <?php if (!empty($studentInfo)): ?>
                <!-- Form for updating student information -->
                <form method='post' action=''>
            <tr>
                <td><strong>Student ID</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['student_id']); ?></td>
            </tr>
            <tr>
                <td><strong>Name</strong></td><td>:</td><td><input type='text' name='student_name' value='<?php echo htmlentities($studentInfo['student_name']); ?>'></td>
            </tr>
            <tr>
                <td><strong>Blood Group</strong></td><td>:</td><td>
                    <select name='blood_group'>
                        <option value='A+' <?php if($studentInfo['blood_group'] == 'A+') echo 'selected'; ?>>A+</option>
                        <option value='A-' <?php if($studentInfo['blood_group'] == 'A-') echo 'selected'; ?>>A-</option>
                        <option value='B+' <?php if($studentInfo['blood_group'] == 'B+') echo 'selected'; ?>>B+</option>
                        <option value='B-' <?php if($studentInfo['blood_group'] == 'B-') echo 'selected'; ?>>B-</option>
                        <option value='AB+' <?php if($studentInfo['blood_group'] == 'AB+') echo 'selected'; ?>>AB+</option>
                        <option value='AB-' <?php if($studentInfo['blood_group'] == 'AB-') echo 'selected'; ?>>AB-</option>
                        <option value='O+' <?php if($studentInfo['blood_group'] == 'O+') echo 'selected'; ?>>O+</option>
                        <option value='O-' <?php if($studentInfo['blood_group'] == 'O-') echo 'selected'; ?>>O-</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Father's Name</strong></td><td>:</td><td><input type='text' name='father_name' value='<?php echo htmlentities($studentInfo['father_name']); ?>'></td>
            </tr>
            <tr>
                <td><strong>Mother's Name</strong></td><td>:</td><td><input type='text' name='mother_name' value='<?php echo htmlentities($studentInfo['mother_name']); ?>'></td>
            </tr>
            <tr>
                <td><strong>Department</strong></td><td>:</td><td>
                    <select name='department'>
                        <option value='Computer Science' <?php if($studentInfo['department'] == 'Computer Science') echo 'selected'; ?>>Computer Science</option>
                        <option value='Electrical Engineering' <?php if($studentInfo['department'] == 'Electrical Engineering') echo 'selected'; ?>>Electrical Engineering</option>
                        <option value='Mechanical Engineering' <?php if($studentInfo['department'] == 'Mechanical Engineering') echo 'selected'; ?>>Mechanical Engineering</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Address</strong></td><td>:</td><td><input type='text' name='address' value='<?php echo htmlentities($studentInfo['address']); ?>'></td>
            </tr>
            <tr>
                <td><strong>Nationality</strong></td><td>:</td><td><input type='text' name='nationality' value='<?php echo htmlentities($studentInfo['nationality']); ?>'></td>
            </tr>
            <tr>
                <td><strong>Sex</strong></td><td>:</td><td>
                    <select name='sex'>
                        <option value='Male' <?php if($studentInfo['sex'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value='Female' <?php if($studentInfo['sex'] == 'Female') echo 'selected'; ?>>Female</option>
                        <option value='Other' <?php if($studentInfo['sex'] == 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                </td>
            </tr>
           
            <tr>
                <td><strong>Religion</strong></td><td>:</td><td>
                    <select name='religion'>
                        <option value='Christian' <?php if($studentInfo['religion'] == 'Christian') echo 'selected'; ?>>Christian</option>
                        <option value='Muslim' <?php if($studentInfo['religion'] == 'Muslim') echo 'selected'; ?>>Muslim</option>
                        <option value='Hindu' <?php if($studentInfo['religion'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>DOB</strong></td><td>:</td><td><input type='text' name='dob' value='<?php echo htmlentities($studentInfo['dob']); ?>'></td>
            </tr>
            <tr>
                <td><strong>Marital Status</strong></td><td>:</td><td>
                    <select name='marital_status'>
                        <option value='Single' <?php if($studentInfo['marital_status'] == 'Single') echo 'selected'; ?>>Single</option>
                        <option value='Married' <?php if($studentInfo['marital_status'] == 'Married') echo 'selected'; ?>>Married</option>
                        <option value='Divorced' <?php if($studentInfo['marital_status'] == 'Divorced') echo 'selected'; ?>>Divorced</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Admission Date</strong></td><td>:</td><td><input type='date' name='admission_date' value='<?php echo htmlentities($studentInfo['admission_date']); ?>'></td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td><td>:</td><td><input type='text' name='phone' value='<?php echo htmlentities($studentInfo['phone']); ?>'></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td><td>:</td><td><input type='text' name='email' value='<?php echo htmlentities($studentInfo['email']); ?>'></td>
            </tr>
            <tr>
                <td><strong>Graduation Date</strong></td><td>:</td><td><input type='date' name='graduation_date' value='<?php echo htmlentities($studentInfo['graduation_date']); ?>'></td>
            </tr>
            <input type='hidden' name='student_id' value='<?php echo htmlentities($studentInfo['student_id']); ?>'>
            <tr><td colspan='3'><button type='submit' name='submit' class='submit-button'>Update</button></td></tr>
        </form>
        <?php else: ?>
            <tr>
                <td colspan="3">No student found with the specified ID.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

    <!-- JavaScript -->
    <script src="../../View/index.js"></script>

</body>
</html>