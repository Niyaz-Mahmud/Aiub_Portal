<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../view/Styles.css">
</head>
<body>
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
        <?php if(isset($welcomeMessage)): ?>
            <!-- Welcome Message -->
            <a href="registrar_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
        <?php endif; ?>

        <!-- Settings Icon -->
        <a href="#" class="setting-link"><i class="fas fa-cog icon"></i></a>
        <!-- Logout Link -->
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
        <!-- Dashboard Links -->
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
        <h2>Add Teacher</h2>
        <!-- Success Message -->
        <?php if(isset($message)): ?>
            <div class="success-message">
                <i class="fas fa-check-circle"></i> <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <!-- Teacher Information Form -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?users_id=" . $_GET['users_id'] . "&user_id=" . $_GET['user_id'] . "&email=" . $_GET['email'] . "&phone=" . $_GET['phone']; ?>" onsubmit="return validateAddTeacherForm();">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br>

            <label for="fathername">Father's Name:</label>
            <input type="text" id="fathername" name="fathername"><br>

            <label for="mothername">Mother's Name:</label>
            <input type="text" id="mothername" name="mothername"><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob"><br>

            <label for="sex">Sex:</label>
            <select id="sex" name="sex">
                <option value="">Select Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address"><br>

            <label for="religion">Religion:</label>
            <select id="religion" name="religion">
                <option value="">Select Religion</option>
                <option value="Christianity">Christianity</option>
                <option value="Islam">Islam</option>
                <option value="Hinduism">Hinduism</option>
                <option value="Buddhism">Buddhism</option>
                <option value="Judaism">Judaism</option>
            </select><br>

            <label for="marital_status">Marital Status:</label>
            <select id="marital_status" name="marital_status">
                <option value="">Select Marital Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
            </select><br>

            <label for="nationality">Nationality:</label>
            <input type="text" id="nationality" name="nationality"><br>

            <label for="blood_group">Blood Group:</label>
            <select id="blood_group" name="blood_group">
                <option value="">Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select><br>

            <label for="department">Department:</label>
            <select id="department" name="department">
                <option value="">Select Department</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
                <option value="Civil Engineering">Civil Engineering</option>
            </select><br>

            <label for="joining_date">Joining Date:</label>
            <input type="date" id="joining_date" name="joining_date"><br>

            <label for="salary">Salary:</label>
            <input type="text" id="salary" name="salary"><br>

            <input type="submit" class="submit-button" name="submit" value="Submit">
        </form>
    </div>
</div>
    <!-- JavaScript -->
    <script src="../../View/index.js"></script>

</body>
</html>