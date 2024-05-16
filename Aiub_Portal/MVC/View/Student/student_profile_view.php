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
    <link rel="stylesheet" href="../../View/Styles.css">
</head>
<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <!-- Logo and University Info -->
        <div class="logo-container">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <div class="university-info">
                <div class="university-name">AIUB</div>
                <div class="tagline">Portal</div>
            </div>
        </div>
        <!-- User Icons and Links -->
        <div class="icons-container">
            <?php if(isset($welcomeMessage)): ?>
                <a href="student_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
            <?php endif; ?>
            <a href="#" class="setting-link"><i class="fas fa-cog icon"></i></a>
            <a href="?logout=true" class="logout-link"><i class="fas fa-sign-out-alt icon"></i> Logout</a>
        </div>
    </div>
    <!-- Settings Menu -->
    <div class="settings-menu" id="settings-menu">
        <ul>
            <li><a href="../changepass_controller.php?users_id=<?php echo htmlentities($userId); ?>">Change Password</a></li>
        </ul>
    </div>
    <div class="dashboard-content">
        <!-- Menu Options -->
        <div class="menu-options">
            <!-- Menu Items with Icons -->
            <a href="student_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'home' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
            <a href="student_course_and_results_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'course_and_results' ? 'active' : ''; ?>"><i class="fas fa-list-alt menu-icon"></i> Course & Result</a>
            <a href="student_registration_system_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'course_registration' ? 'active' : ''; ?>"><i class="fas fa-book-open menu-icon"></i> Course Registration</a>
            <a href="Student_offered_Course_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'offered_courses' ? 'active' : ''; ?>"><i class="fas fa-graduation-cap menu-icon"></i> Offered Courses</a>
            <a href="student_grade_report_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'grade_report' ? 'active' : ''; ?>"><i class="fas fa-file-alt menu-icon"></i> Grade Reports</a>
            <a href="student_drop_course_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'drop_course' ? 'active' : ''; ?>"><i class="fas fa-times-circle menu-icon"></i> Drop Course</a>
            <a href="student_resource_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'resources' ? 'active' : ''; ?>"><i class="fas fa-book menu-icon"></i> Resources</a>
            <a href="student_notice_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'notices' ? 'active' : ''; ?>"><i class="fas fa-bell menu-icon"></i> Notices</a>
            <a href="student_enrolled_courses_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'enrolled_courses' ? 'active' : ''; ?>"><i class="fas fa-book menu-icon"></i> Enrolled Courses</a>
            <a href="student_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'payment' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payment</a>
        </div>
        <!-- Student Information Table -->
        <table class="Student-info-table">
            <tr>
                <th colspan="3">Student Information</th>
            </tr>
            <?php if (!empty($studentInfo)): ?>
                <tr>
                    <td><strong>Student ID</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['student_id']); ?></td>
                </tr>
                <tr>
                    <td><strong>Name</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['student_name']); ?></td>
                </tr>
                <tr>
                    <td><strong>Blood Group</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['blood_group']); ?></td>
                </tr>
                <tr>
                    <td><strong>Father's Name</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['father_name']); ?></td>
                </tr>
                <tr>
                    <td><strong>Mother's Name</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['mother_name']); ?></td>
                </tr>
                <tr>
                    <td><strong>Department</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['department']); ?></td>
                </tr>
                <tr>
                    <td><strong>Address</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['address']); ?></td>
                </tr>
                <tr>
                    <td><strong>Nationality</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['nationality']); ?></td>
                </tr>
                <tr>
                    <td><strong>Sex</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['sex']); ?></td>
                </tr>
                <tr>
                    <td>Cgpa</td>
                    <td>:</td>
                    <td><?php echo number_format($cgpa, 2); ?></td>
                </tr>
                <tr>
                    <td><strong>Religion</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['religion']); ?></td>
                </tr>
                <tr>
                    <td><strong>DOB</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['dob']); ?></td>
                </tr>
                <tr>
                    <td><strong>Marital Status</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['marital_status']); ?></td>
                </tr>
                <tr>
                    <td><strong>Admission Date</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['admission_date']); ?></td>
                </tr>
                <tr>
                    <td><strong>Phone</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['phone']); ?></td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['email']); ?></td>
                </tr>
                <tr>
                    <td><strong>Graduation Date</strong></td><td>:</td><td><?php echo htmlentities($studentInfo['graduation_date']); ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="3">No student found with the specified ID.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <script src="../../View/index.js"></script>

</body>
</html>