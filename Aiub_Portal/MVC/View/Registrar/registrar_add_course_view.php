<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../view/Styles.css"> 
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
    <!-- User welcome message and icons -->
    <div class="icons-container">
        <?php if(isset($welcomeMessage)): ?>
            <a href="registrar_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
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
        <!-- Links to different sections -->
        <!-- Active class is applied based on current page -->
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
        <!-- Form for adding a course -->
        <div class="add-course-form">
            <h2>Add Course</h2>
            <!-- PHP messages -->
            <?php if(isset($message)): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> <?php echo $message; ?>
                </div>
            <?php elseif(isset($error)): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <!-- Course addition form -->
            <form id="addCourseForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?users_id=" . htmlentities($userId)); ?>" method="POST" onsubmit="return validateAddCourseForm()">
                <label for="course_name">Title:</label>
                <!-- Select input for course name -->
                <select id="course_name" name="course_name" >
                    <!-- PHP loop to populate options -->
                    <?php
                    foreach ($courses as $course) {
                        echo "<option value=\"$course\">$course</option>";
                    }
                    ?>
                </select><br><br>
                <label for="section">Section:</label>
                <!-- Select input for section -->
                <select id="section" name="section" >
                    <!-- PHP loop to populate options -->
                    <?php
                    foreach ($sections as $section) {
                        echo "<option value=\"$section\">$section</option>";
                    }
                    ?>
                </select><br><br>
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" ><br><br>
                <label for="weekday">Weekday:</label>
                <!-- Select input for weekday -->
                <select id="weekday" name="weekday" >
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Sunday">Sunday</option>
                </select><br><br>
                <!-- Time range inputs -->
                <div class="time-range">
                    <label for="start_time">Start Time:</label>
                    <input type="time" id="start_time" name="start_time" >
                    <label for="end_time">End Time:</label>
                    <input type="time" id="end_time" name="end_time" >
                </div><br><br>
                <label for="status">Status:</label>
                <!-- Select input for status -->
                <select id="status" name="status" >
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                </select><br><br>
                <!-- Submit button -->
                <input type="submit" class="submit-button" value="Add Course">
            </form>
        </div>
    </div>
</div>

    <script src="../../View/index.js"></script>

</body>
</html>
