<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Leave</title>
    <!-- External CSS libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../View/Styles.css"> 
</head>
<body>
    <!-- Dashboard header section -->
    <div class="dashboard-header">
        <div class="logo-container">
            <!-- University logo -->
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <div class="university-info">
                <!-- University name and tagline -->
                <div class="university-name">AIUB</div>
                <div class="tagline">Portal</div>
            </div>
        </div>
        <!-- User icons and settings -->
        <div class="icons-container">
            <?php if(isset($welcomeMessage)): ?>
                <!-- Welcome message -->
                <a href="teacher_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
            <?php endif; ?>
            <!-- Settings icon -->
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
    <!-- Dashboard content -->
    <div class="dashboard-content">
        <!-- Menu options -->
        <div class="menu-options">
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
        <!-- Leave application form -->
        <div class="container">
            <div class="apply-leave-form">
                <h2>Apply Leave</h2>
                <!-- Success or error messages -->
                <?php if(isset($message)): ?>
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i> <?php echo $message; ?>
                    </div>
                <?php elseif(isset($error)): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
                <!-- Leave application form -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?users_id=<?php echo htmlspecialchars($userId); ?>" method="POST">
                    <input type="hidden" name="EmployeeType" value="teacher">
                    <input type="hidden" name="users_id" value="<?php echo htmlspecialchars($userId); ?>">
                    <label for="reason">Reason:</label>
                    <textarea id="reason" name="reason" rows="4" cols="50" placeholder="Enter your reason here..."></textarea><br><br>
                    <label for="start-date">Start Date:</label>
                    <input type="date" id="start-date" name="start_date"><br><br>
                    <label for="end-date">End Date:</label>
                    <input type="date" id="end-date" name="end_date"><br><br>
                    <button type="submit" class='submit-button' id="Submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- JavaScript for settings menu and form validation -->
    <script src="../../View/index.js"></script>

</body>
</html>
