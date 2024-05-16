<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Resource</title>
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

            <!-- Setting icon -->
            <a href="#" class="setting-link"><i class="fas fa-cog icon"></i></a>
            <!-- Logout link -->
            <a href="?logout=true" class="logout-link"><i class="fas fa-sign-out-alt icon"></i> Logout</a>
        </div>
    </div>
    <!-- Settings menu -->
    <div class="settings-menu" id="settings-menu">
        <ul>
            <li><a href="changepass_controller.php?users_id=<?php echo htmlentities($userId); ?>">Change Password</a></li>
        </ul>
    </div>
    <!-- Dashboard content -->
    <div class="dashboard-content">
        <div class="menu-options">
            <a href="teacher_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-home menu-icon"></i> Home</a>
            <a href="teacher_registration_system_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-book-open menu-icon"></i> Course Registration</a>
            <a href="teacher_submit_grade_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-edit menu-icon"></i> Grade Submission</a>
            <a href="teacher_resource_manage_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="active"><i class="fas fa-file menu-icon"></i> Resources</a>
            <a href="teacher_publish_notice_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-bullhorn menu-icon"></i> Announcement</a>
            <a href="teacher_accept_Drop_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-times-circle menu-icon"></i> Dropping</a>
            <a href="teacher_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-money-bill menu-icon"></i> Payment</a>
            <a href="teacher_offered_courses_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-graduation-cap menu-icon"></i> Offered Courses</a>
            <a href="teacher_leave_status_controller.php?users_id=<?php echo htmlspecialchars($userId); ?>"><i class="fas fa-calendar-alt menu-icon"></i> Apply Leave</a>
        </div>
        <div class="container">
            <!-- Upload resource form -->
            <div class="upload-resource">
                <h2>Upload Resource</h2>
                <?php if (!empty($successMessage)): ?>
                    <!-- Success message -->
                    <p class="success-message"><?php echo $successMessage; ?></p>
                <?php endif; ?>
                <form method="POST" enctype="multipart/form-data">
                    <label for="course_name">Course Name:</label>
                    <select id="course_name" name="course_name">
                        <option value="">Select Course</option>
                        <?php foreach ($courses as $course): ?>
                            <option value="<?php echo htmlentities($course['course_name'] . '[' . $course['section'] . ']'); ?>"><?php echo htmlentities($course['course_name'] . ' [' . $course['section'] . ']'); ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                    <label for="file">Choose File:</label>
                    <input type="file" id="file" name="file" accept=".pdf,.doc,.docx"><br><br>
                    <!-- Upload button -->
                    <button type="submit" name="upload" class="upload-button">Upload</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="../../View/index.js"></script>

</body>
</html>