<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Common styles -->
    <link rel="stylesheet" href="../../View/Styles.css">
</head>
<body>
<div class="dashboard-header">
    <!-- University logo and info -->
    <div class="logo-container">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
        <div class="bar"></div>
        <div class="university-info">
            <div class="university-name">AIUB</div>
            <div class="tagline">Portal</div>
        </div>
    </div>
    <!-- User options -->
    <div class="icons-container">
        <?php if(isset($welcomeMessage)): ?>
            <a href="hr_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
        <?php endif; ?>
        <a href="#" class="setting-link"><i class="fas fa-cog icon"></i></a>
        <a href="?logout=true" class="logout-link"><i class="fas fa-sign-out-alt icon"></i> Logout</a>
    </div>
</div>
<!-- Settings menu -->
<div class="settings-menu" id="settings-menu">
    <ul>
        <li><a href="../changepass_controller.php?users_id=<?php echo htmlentities($userId); ?>">Change Password</a></li>
    </ul>
</div>
<div class="dashboard-content">
    <!-- Menu options -->
    <div class="menu-options">
        <a href="hr_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
        <a href="hr_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Information</a>
        <a href="hr_leave_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_leave_management' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Leave Management</a>
        <a href="hr_payroll_process_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_payroll_process' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payroll Processing</a>
        <a href="hr_student_financial_information_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_student_financial_information' ? 'active' : ''; ?>"><i class="fas fa-dollar-sign menu-icon"></i> Student Financial Info</a>
    </div>
    <!-- HR information table -->
    <table class="hr-info-table">
        <tr>
            <th colspan="3">HR Information</th>
        </tr>
        <?php if (!empty($hrInfo)): ?>
            <!-- Display HR information -->
            <tr>
                <td><strong>HR ID</strong></td><td>:</td><td><?php echo $hrInfo['HRID']; ?></td>
            </tr>
            <tr>
                <td><strong>HR Name</strong></td><td>:</td><td><?php echo $hrInfo['HRName']; ?></td>
            </tr>
            <tr>
                <td><strong>Father Name</strong></td><td>:</td><td><?php echo $hrInfo['FatherName']; ?></td>
            </tr>
            <tr>
                <td><strong>Mother Name</strong></td><td>:</td><td><?php echo $hrInfo['MotherName']; ?></td>
            </tr>
            <tr>
                <td><strong>Blood Group</strong></td><td>:</td><td><?php echo $hrInfo['BloodGroup']; ?></td>
            </tr>
            <tr>
                <td><strong>Address</strong></td><td>:</td><td><?php echo $hrInfo['Address']; ?></td>
            </tr>
            <tr>
                <td><strong>Religion</strong></td><td>:</td><td><?php echo $hrInfo['Religion']; ?></td>
            </tr>
            <tr>
                <td><strong>Marital Status</strong></td><td>:</td><td><?php echo $hrInfo['MaritalStatus']; ?></td>
            </tr>
            <tr>
                <td><strong>Joining Date</strong></td><td>:</td><td><?php echo $hrInfo['JoiningDate']; ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td><td>:</td><td><?php echo $hrInfo['Email']; ?></td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td><td>:</td><td><?php echo $hrInfo['Phone']; ?></td>
            </tr>
            <tr>
                <td><strong>Nationality</strong></td><td>:</td><td><?php echo $hrInfo['Nationality']; ?></td>
            </tr>
            <tr>
                <td><strong>Leaving Date</strong></td><td>:</td><td><?php echo $hrInfo['LeavingDate']; ?></td>
            </tr>
        <?php else: ?>
            <!-- No HR found message -->
            <tr>
                <td colspan="3">No human resource found with the specified ID.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
    
    <script src="../../View/index.js"></script>

</body>
</html>
