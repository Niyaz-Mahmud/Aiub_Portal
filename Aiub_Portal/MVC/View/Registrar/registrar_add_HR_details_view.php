<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../view/Styles.css">
</head>
<body>
<div class="dashboard-header">
    <!-- Logo and university info -->
    <div class="logo-container">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
        <div class="bar"></div>
        <div class="university-info">
            <div class="university-name">AIUB</div>
            <div class="tagline">Portal</div>
        </div>
    </div>
    <!-- Icons and user info -->
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
    <!-- HR details form -->
    <div class="container">
        <h2>Add HR</h2>
        <?php if(isset($message)): ?>
            <div class="success-message">
                <i class="fas fa-check-circle"></i> <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <!-- Form for adding HR -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?users_id=" . $_GET['users_id'] . "&user_id=" . $_GET['user_id'] . "&email=" . $_GET['email'] . "&phone=" . $_GET['phone']; ?>" onsubmit="return validateAddHRForm()">
            <label for="HRName">HR Name:</label>
            <input type="text" id="HRName" name="HRName"><br>

            <label for="FatherName">Father's Name:</label>
            <input type="text" id="FatherName" name="FatherName"><br>

            <label for="MotherName">Mother's Name:</label>
            <input type="text" id="MotherName" name="MotherName"><br>

            <label for="BloodGroup">Blood Group:</label>
            <!-- Select input for blood group -->
            <select id="BloodGroup" name="BloodGroup">
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

            <label for="Address">Address:</label>
            <input type="text" id="Address" name="Address"><br>

            <label for="Religion">Religion:</label>
            <!-- Select input for religion -->
            <select id="Religion" name="Religion">
                <option value="">Select Religion</option>
                <option value="Christianity">Christianity</option>
                <option value="Islam">Islam</option>
                <option value="Hinduism">Hinduism</option>
                <option value="Buddhism">Buddhism</option>
                <option value="Judaism">Judaism</option>
            </select><br>

            <label for="MaritalStatus">Marital Status:</label>
            <!-- Select input for marital status -->
            <select id="MaritalStatus" name="MaritalStatus">
                <option value="">Select Marital Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
            </select><br>

            <label for="JoiningDate">Joining Date:</label>
            <input type="date" id="JoiningDate" name="JoiningDate"><br>

            <label for="Nationality">Nationality:</label>
            <input type="text" id="Nationality" name="Nationality"><br>

            <input type="submit" class="submit-button" name="submit" value="Submit">
        </form>
    </div>
</div>

    <script src="../../View/index.js"></script>
    
</body>
</html>
