<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Common Stylesheet -->
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
        <!-- Icons and User Information -->
        <div class="icons-container">
            <?php if (isset($welcomeMessage)) : ?>
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

    <!-- Dashboard Content -->
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

        <!-- Main Content Area -->
        <div class="container">
            <div class="row">
                <div id="main-content" class="col-md-9 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <!-- Semester Selection -->
                            <div class="row">
                                <div class="col-md-1 col-lg-1">
                                    <h2>Drop courses</h2>
                                    <label class="label-height-30">Semesters:</label>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                <select class="form-control" id="SemesterDropDown" name="SemesterDropDown" onchange="handleDropCourseChangeSemester(this.value, '<?php echo htmlentities($userId); ?>')">
                                        <!-- Populate Semester Dropdown -->
                                        <?php foreach ($semesters as $semester) : ?>
                                            <option value="<?php echo htmlentities($semester); ?>" <?php if (isset($_GET["semester"]) && $_GET["semester"] == htmlentities($semester)) echo "selected"; ?>><?php echo htmlentities($semester); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <!-- Table for Course Dropping -->
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="drop-course-table">
                                        <thead>
                                            <tr>
                                                <th>Course Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Display courses available for dropping -->
                                            <?php if ($grades) : ?>
                                                <?php foreach ($grades as $grade) : ?>
                                                    <form method="post">
                                                        <tr>
                                                            <td><?php echo $grade['course_name'] . " [" . $grade['section'] . "]"; ?></td>
                                                            <td>
                                                                <input type="hidden" name="course_name" value="<?php echo htmlentities($grade['course_name']); ?>">
                                                                <input type="hidden" name="section" value="<?php echo htmlentities($grade['section']); ?>">
                                                                <input type="submit" name="drop_course" value="Drop" class="drop-button">
                                                            </td>
                                                        </tr>
                                                    </form>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="2">No courses available for this semester.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Settings Menu and Semester Selection -->
    <script src="../../View/index.js"></script>

</body>
</html>
