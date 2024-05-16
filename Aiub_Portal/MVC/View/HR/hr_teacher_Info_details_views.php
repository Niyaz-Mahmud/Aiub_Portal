<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Information</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../View/Styles.css">
</head>
<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="logo-container">
            <!-- University Logo -->
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <div class="university-info">
                <!-- University Name and Tagline -->
                <div class="university-name">AIUB</div>
                <div class="tagline">Portal</div>
            </div>
        </div>
        <div class="icons-container">
            <!-- Welcome Message -->
            <?php if(isset($welcomeMessage)): ?>
                <a href="hr_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
            <?php endif; ?>

            <!-- Settings and Logout Links -->
            <a href="#" class="setting-link"><i class="fas fa-cog icon"></i></a>
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
    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <!-- Menu Options -->
        <div class="menu-options">
            <a href="hr_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
            <a href="hr_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Information</a>
            <a href="hr_leave_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_leave_management' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Leave Management</a>
            <a href="hr_payroll_process_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_payroll_process' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payroll Processing</a>
            <a href="hr_student_financial_information_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_student_financial_information' ? 'active' : ''; ?>"><i class="fas fa-dollar-sign menu-icon"></i> Student Financial Info</a>
        </div>
            <!-- Teacher Table -->
            <table class="Teacher-info-table">
            <tr>
                <th colspan="3">Teacher Information</th>
            </tr>
            <?php foreach ($teachers as $teacher): ?>
                <tr>
                    <td><strong>ID</strong></td><td>:</td><td><?php echo $teacher['id']; ?></td>
                </tr>
                <tr>
                    <td><strong>Name</strong></td><td>:</td><td><?php echo $teacher['name']; ?></td>
                </tr>
                <tr>
                    <td><strong>Father's Name</strong></td><td>:</td><td><?php echo $teacher['fathername']; ?></td>
                </tr>
                <tr>
                    <td><strong>Mother's Name</strong></td><td>:</td><td><?php echo $teacher['mothername']; ?></td>
                </tr>
                <tr>
                    <td><strong>DOB</strong></td><td>:</td><td><?php echo $teacher['dob']; ?></td>
                </tr>
                <tr>
                    <td><strong>Sex</strong></td><td>:</td><td><?php echo $teacher['sex']; ?></td>
                </tr>
                <tr>
                    <td><strong>Address</strong></td><td>:</td><td><?php echo $teacher['address']; ?></td>
                </tr>
                <tr>
                    <td><strong>Religion</strong></td><td>:</td><td><?php echo $teacher['religion']; ?></td>
                </tr>
                <tr>
                    <td><strong>Marital Status</strong></td><td>:</td><td><?php echo $teacher['marital_status']; ?></td>
                </tr>
                <tr>
                    <td><strong>Nationality</strong></td><td>:</td><td><?php echo $teacher['nationality']; ?></td>
                </tr>
                <tr>
                    <td><strong>Blood Group</strong></td><td>:</td><td><?php echo $teacher['blood_group']; ?></td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td><td>:</td><td><?php echo $teacher['email']; ?></td>
                </tr>
                <tr>
                    <td><strong>Phone</strong></td><td>:</td><td><?php echo $teacher['phone']; ?></td>
                </tr>
                <tr>
                    <td><strong>Joining Date</strong></td><td>:</td><td><?php echo $teacher['joining_date']; ?></td>
                </tr>
                <tr>
                    <td><strong>Leaving Date</strong></td><td>:</td><td><?php echo $teacher['leaving_date']; ?></td>
                </tr>
                <tr>
                    <td><strong>Department</strong></td><td>:</td><td><?php echo $teacher['department']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <script src="../../View/index.js"></script>

</body>
</html>
