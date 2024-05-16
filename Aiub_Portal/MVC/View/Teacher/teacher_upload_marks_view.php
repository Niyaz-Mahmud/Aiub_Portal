<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

<div class="container">
    <div class="mark-upload">
        <h2>Mark Upload</h2>
        <form method="post">
            <table>
                <thead>
                    <tr>
                        <th>Total Grade: <?php echo $total_grade; ?></th>
                    </tr>
                    <tr>
                        <th>Mid Quiz 1</th>
                        <th>Mid Quiz 2</th>
                        <th>Mid Best Quiz</th>
                        <th>Mid Attendance</th>
                        <th>Mid Written</th>
                        <th>Mid Assignment</th>
                        <th>Mid Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($grades)): ?>
                        <tr>
                        <td><input type="number" name="mid_quiz1" value=""></td>
                            <td><input type="number" name="mid_quiz2" value=""></td>
                            <td><input type="number" name="mid_best_quiz" value=""></td>
                            <td><input type="number" name="mid_attendance" value=""></td>
                            <td><input type="number" name="mid_written" value=""></td>
                            <td><input type="number" name="mid_assignment" value=""></td>
                            <td><input type="number" name="mid_grade" value=""readonly></td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($grades as $grade): ?>
                            <tr>
                                <td><input type="number" name="mid_quiz1" value="<?php echo $grade['mid_quiz1']; ?>"></td>
                                <td><input type="number" name="mid_quiz2" value="<?php echo $grade['mid_quiz2']; ?>"></td>
                                <td><input type="number" name="mid_best_quiz" value="<?php echo $grade['mid_best_quiz']; ?>"readonly></td>
                                <td><input type="number" name="mid_attendance" value="<?php echo $grade['mid_attendance']; ?>"></td>
                                <td><input type="number" name="mid_written" value="<?php echo $grade['mid_written']; ?>"></td>
                                <td><input type="number" name="mid_assignment" value="<?php echo $grade['mid_assignment']; ?>"></td>
                                <td ><input type="number" name="mid_grade" value="<?php echo $grade['mid_grade']; ?>"readonly></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                <thead>
                    <tr>
                        <th>Final Quiz 1</th>
                        <th>Final Quiz 2</th>
                        <th>Final Best Quiz</th>
                        <th>Final Attendance</th>
                        <th>Final Written</th>
                        <th>Final Assignment</th>
                        <th>Final Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($grades)): ?>
                        <tr>
                        <td><input type="number" name="final_quiz1" value=""></td>
                            <td><input type="number" name="final_quiz2" value=""></td>
                            <td><input type="number" name="final_best_quiz" value=""readonly></td>
                            <td><input type="number" name="final_attendance" value=""></td>
                            <td><input type="number" name="final_written" value=""></td>
                            <td><input type="number" name="final_assignment" value=""></td>
                            <td><input type="number" name="final_grade" value=""readonly></td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($grades as $grade): ?>
                            <tr>
                                <td><input type="number" name="final_quiz1" value="<?php echo $grade['final_quiz1']; ?>"></td>
                                <td><input type="number" name="final_quiz2" value="<?php echo $grade['final_quiz2']; ?>"></td>
                                <td><input type="number" name="final_best_quiz" value="<?php echo $grade['final_best_quiz']; ?>"readonly></td>
                                <td><input type="number" name="final_attendance" value="<?php echo $grade['final_attendance']; ?>"></td>
                                <td><input type="number" name="final_written" value="<?php echo $grade['final_written']; ?>"></td>
                                <td><input type="number" name="final_assignment" value="<?php echo $grade['final_assignment']; ?>"></td>
                                <td><input type="number" name="final_grade" value="<?php echo $grade['final_grade']; ?>"readonly></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <button type="submit" class="upload-button" name="upload">Upload</button>
        </form>
    </div>
</div>

    <script src="../../View/index.js"></script>

</body>
</html>
