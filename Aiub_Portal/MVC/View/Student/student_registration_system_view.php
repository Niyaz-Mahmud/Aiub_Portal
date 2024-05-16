<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Course Registration</title>
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
        <!-- Registration Form -->
        <div class="registration-form">
            <h2>Course Registration</h2>
            <!-- Search Box -->
            <div class="search-box">
                <form action="student_registration_system_controller.php" method="GET">
                    <input type="hidden" name="users_id" value="<?php echo htmlentities($userId); ?>">
                    <input type="text" id="searchInput" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
                    <button type="submit">Search</button>
                </form>
            </div>
            <!-- Course Selection Form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?users_id=<?php echo htmlentities($userId); ?>" method="POST">
                <!-- Semester Selection -->
                <div class="semester-selection">
                    <label for="semester">Select Semester:</label>
                    <select name="semester" id="semester">
                        <option value="Spring">Spring</option>
                        <option value="Fall">Fall</option>
                        <option value="Summer">Summer</option>
                    </select>
                </div>
                <!-- Course Table -->
                <table id="courseTable">
                    <tr>
                        <th>Course</th>
                        <th>Day</th>
                        <th>Time</th>
                    </tr>
                    <!-- Iterate over available courses -->
                    <?php foreach ($availableCourses as $courseName) : ?>
                        <tr class="course-row">
                            <th colspan="3">
                                <div class="course-title"><?php echo $courseName; ?></div>
                            </th>
                        </tr>
                        <?php
                        // Fetch courses by course name
                        $courses = fetchCoursesByCourseName($courseName);
                        foreach ($courses as $course) :
                        ?>
                            <tr>
                                <td>
                                    <label>
                                        <!-- Radio button for course selection -->
                                        <input type="radio" name="courses[<?php echo $courseName . ' - ' . $course['section']; ?>]" value="<?php echo $course['course_name'] . ' - ' . $course['section']; ?>" id="<?php echo $course['section']; ?>">
                                        <?php echo $course['course_name'] . " [" . $course['section'] . "]"; ?>
                                    </label>
                                </td>
                                <td><?php echo $course['day']; ?></td>
                                <td><?php echo $course['start_time'] . ' - ' . $course['end_time']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </table>
                <!-- Message for no matching records -->
                <p id="noMatchMessage" style="display: <?php echo (empty($courses)) ? 'block' : 'none'; ?>">No matching records found.</p>
                <!-- Enroll Button -->
                <button type="submit" id="enrollButton" class="submit-button">Enroll</button>
            </form>
            <!-- Pagination -->
            <div class="pagination">
                <?php
                $total_pages = getTotalPages($results_per_page);

                if ($page > 1) {
                    echo "<a href='?users_id=$userId&page=" . ($page - 1) . "'>&laquo; Previous</a>";
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page) {
                        echo "<span class='current-page'>$i</span>";
                    } else {
                        echo "<a href='?users_id=$userId&page=$i'>$i</a>";
                    }
                }

                if ($page < $total_pages) {
                    echo "<a href='?users_id=$userId&page=" . ($page + 1) . "'>Next &raquo;</a>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="../../View/index.js"></script>

</body>
</html>
