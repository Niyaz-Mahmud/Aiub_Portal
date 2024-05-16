<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External CSS stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../View/Styles.css"> 
</head>
<body>
    <div class="dashboard-header">
        <div class="logo-container">
            <!-- University Logo -->
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <!-- University Info -->
            <div class="university-info">
                <div class="university-name">AIUB</div>
                <div class="tagline">Portal</div>
            </div>
        </div>
        <!-- Icons Container -->
        <div class="icons-container">
            <?php if(isset($welcomeMessage)): ?>
                <!-- Welcome Message -->
                <a href="teacher_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
            <?php endif; ?>
            <!-- Setting Icon -->
            <a href="#" class="setting-link"><i class="fas fa-cog icon"></i></a>
            <!-- Logout Link -->
            <a href="?logout=true" class="logout-link"><i class="fas fa-sign-out-alt icon"></i> Logout</a>
        </div>
    </div>
    <!-- Settings Menu -->
    <div class="settings-menu" id="settings-menu">
        <ul>
            <!-- Change Password Link -->
            <li><a href="../changepass_controller.php?users_id=<?php echo htmlentities($userId); ?>">Change Password</a></li>
        </ul>
    </div>
    <div class="dashboard-content">
        <!-- Menu Options -->
        <div class="menu-options">
            <!-- Menu Links -->
            <a href="teacher_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'teacher_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
            <a href="teacher_registration_system_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'teacher_registration_system' ? 'active' : ''; ?>"><i class="fas fa-book-open menu-icon"></i> Course Registration</a>
            <a href="teacher_submit_grade_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'teacher_submit_grade' ? 'active' : ''; ?>"><i class="fas fa-edit menu-icon"></i> Grade Submission</a>
            <a href="teacher_resource_manage_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'teacher_resource_manage' ? 'active' : ''; ?>"><i class="fas fa-file menu-icon"></i> Resources</a>
            <a href="teacher_publish_notice_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'teacher_publish_notice' ? 'active' : ''; ?>"><i class="fas fa-bullhorn menu-icon"></i> Announcement</a>
            <a href="teacher_accept_Drop_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'teacher_accept_Drop' ? 'active' : ''; ?>"><i class="fas fa-times-circle menu-icon"></i> Dropping</a>
            <a href="teacher_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'teacher_payment' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payment</a>
            <a href="teacher_offered_courses_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'teacher_offered_courses' ? 'active' : ''; ?>"><i class="fas fa-graduation-cap menu-icon"></i> Offered Courses</a>
            <a href="teacher_leave_status_controller.php?users_id=<?php echo htmlspecialchars($userId); ?>" class="<?php echo $currentPage === 'teacher_leave_status' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Apply Leave</a>
        </div>

        <!-- Teacher Information Table -->
        <table class="Teacher-info-table">
            <tr>
                <th colspan="3">Teacher Information</th>
            </tr>
            <?php if (!empty($teacherInfo)): ?>
                <!-- Displaying Teacher Information -->
                <tr>
                    <td><strong>ID</strong></td><td>:</td><td><span id='id'><?php echo $teacherInfo['id']; ?></span></td>
                </tr>
                <tr>
                    <td><strong>Name</strong></td><td>:</td><td><?php echo $teacherInfo['name']; ?></td>
                </tr>
                <tr>
                    <td><strong>Father's Name</strong></td><td>:</td><td><?php echo $teacherInfo['fathername']; ?></td>
                </tr>
                <tr>
                    <td><strong>Mother's Name</strong></td><td>:</td><td><?php echo $teacherInfo['mothername']; ?></td>
                </tr>
                <tr>
                    <td><strong>DOB</strong></td><td>:</td><td><?php echo $teacherInfo['dob']; ?></td>
                </tr>
                <tr>
                    <td><strong>Sex</strong></td><td>:</td><td><?php echo $teacherInfo['sex']; ?></td>
                </tr>
                <tr>
                    <td><strong>Address</strong></td><td>:</td><td><?php echo $teacherInfo['address']; ?></td>
                </tr>
                <tr>
                    <td><strong>Religion</strong></td><td>:</td><td><?php echo $teacherInfo['religion']; ?></td>
                </tr>
                <tr>
                    <td><strong>Marital Status</strong></td><td>:</td><td><?php echo $teacherInfo['marital_status']; ?></td>
                </tr>
                <tr>
                    <td><strong>Nationality</strong></td><td>:</td><td><?php echo $teacherInfo['nationality']; ?></td>
                </tr>
                <tr>
                    <td><strong>Blood Group</strong></td><td>:</td><td><?php echo $teacherInfo['blood_group']; ?></td>
                </tr>
                <tr>
                    <td><strong>Phone</strong></td><td>:</td><td><?php echo $teacherInfo['phone']; ?></td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td><td>:</td><td><?php echo $teacherInfo['email']; ?></td>
                </tr>
                <tr>
                    <td><strong>Joining Date</strong></td><td>:</td><td><?php echo $teacherInfo['joining_date']; ?></td>
                </tr>
                <tr>
                    <td><strong>Leaving Date</strong></td><td>:</td><td><?php echo $teacherInfo['leaving_date']; ?></td>
                </tr>
                <tr>
                    <td><strong>Department</strong></td><td>:</td><td><?php echo $teacherInfo['department']; ?></td>
                </tr>
            <?php else: ?>
                <!-- If no teacher found -->
                <tr>
                    <td colspan="3">No teacher found with the specified ID.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <script src="../../View/index.js"></script>

</body>
</html>
