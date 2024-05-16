<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link to common styles -->
    <link rel="stylesheet" href="../../View/Styles.css">
</head>
<body>
<div class="dashboard-header">
    <!-- University logo and name -->
    <div class="logo-container">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
        <div class="bar"></div>
        <div class="university-info">
            <div class="university-name">AIUB</div>
            <div class="tagline">Portal</div>
        </div>
    </div>
    <!-- User icons and links -->
    <div class="icons-container">
        <?php if(isset($welcomeMessage)): ?>
            <a href="student_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
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

<!-- Container for grade report -->
    <div class="container">
        <div class="grade-report">
            <table class="student-info">
                <h2>Grade Report</h2>
                <tr>
                    <td>Student ID</td>
                    <td>:</td>
                    <td><?php echo htmlentities($userId); ?></td>
                </tr>

                <tr>
                    <td>Student Name</td>
                    <td>:</td>
                    <td><?php echo htmlentities(fetchNameFromDatabase($userId)); ?></td>
                </tr>

                <tr>
                    <td>Course(s) Completed</td>
                    <td>:</td>
                    <td><?php echo count($courseInfo); ?></td>
                </tr>

                <tr>
                    <td>Cgpa</td>
                    <td>:</td>
                    <td><?php echo number_format($cgpa, 2); ?></td>
                </tr>
            </table>

            <?php if(isset($courseInfo) && is_array($courseInfo) && count($courseInfo) > 0): ?>
                <?php
                $semesters = array();
                foreach($courseInfo as $course) {
                    $semesters[$course['semester']][] = $course; 
                }
                ?>

                <?php foreach($semesters as $semester => $courses): ?>
                    <table class="semester-info">
                        <tr>
                            <td colspan="5" class="semester-title"><?php echo htmlentities($semester); ?></td>
                        </tr>
                        <tr>
                            <th>Course Name</th>
                            <th>Mid Term Grade</th>
                            <th>Final Term Grade</th>
                            <th>Final Grade</th>
                            <th>Grade Point</th>
                        </tr>
                
                        <?php foreach($courses as $course): ?>
                            <tr>
                                <td><?php echo htmlentities($course['course_name']); ?></td>
                                <td><?php echo htmlentities($course['mid_grade']); ?></td>
                                <td><?php echo htmlentities($course['final_grade']); ?></td>
                                <td><?php echo htmlentities($course['total_grade']); ?></td>
                                <td><?php echo calculateGradePoint($course['total_grade']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No course information found for this student.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

   <script src="../../View/index.js"></script>

</body>
</html>
