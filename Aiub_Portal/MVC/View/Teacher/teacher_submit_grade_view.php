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

            <!-- Setting icon -->
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
        <div class="menu-options">
            <!-- Navigation links -->
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
            <div class="row">
                <h2 class="panel-title">Grades Marks</h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Courses:</label>
                        <select class="form-control" id="CourseDropDown" name="CourseDropDown" onchange="handleChangeCourse(this.value, '<?php echo htmlentities($userId); ?>')">

                        <?php if(isset($courses) && !empty($courses)): ?>
                            <?php foreach ($courses as $course => $sections): ?>
                                <?php foreach ($sections as $section): ?>
                                    <option value="<?php echo htmlentities($course . ' [' . $section . ']'); ?>" <?php if(isset($_GET["course"]) && $_GET["course"] == htmlentities($course . ' [' . $section . ']')) echo "selected"; ?>><?php echo htmlentities($course . ' [' . $section . ']'); ?></option>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Semesters:</label>
                        <select class="form-control" id="SemesterDropDown" name="SemesterDropDown" onchange="handleChangeSemesterTeacher(this.value, '<?php echo htmlentities($userId); ?>')">
                            <?php foreach ($semesters as $semester): ?>
                                <option value="<?php echo htmlentities($semester); ?>" <?php if(isset($_GET["semester"]) && $_GET["semester"] == htmlentities($semester)) echo "selected"; ?>><?php echo htmlentities($semester); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <br />
                <table class="teacher-grade-table">
                    <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="studentDetails">
                        <?php if(isset($courses) && !empty($courses)): ?>
                            <?php

                            $initialCourse = isset($_GET['course']) ? $_GET['course'] : key($courses);
                            $startPos = strpos($initialCourse, '[');
                            $endPos = strpos($initialCourse, ']');

                            if ($startPos !== false && $endPos !== false) {
                                $section = substr($initialCourse, $startPos + 1, $endPos - $startPos - 1);
                            }
                            $initialSection = isset($section) ? $section :  reset($courses[$initialCourse]);

                            $selectedSemester = isset($_GET['semester']) ? $_GET['semester'] : '';

                            $students = fetchStudentsForCourseAndSemester($initialCourse, $initialSection, $selectedSemester);
                            ?>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?php echo htmlentities($student['student_id']); ?></td>
                                    <td><?php echo htmlentities($student['student_name']); ?></td>
                                    <td><button type="button" class="submit-button upload-grade-button" onclick="uploadGrade('<?php echo htmlentities($userId); ?>', '<?php echo htmlentities($student['student_id']); ?>', '<?php echo htmlentities($initialCourse); ?>', '<?php echo htmlentities($initialSection); ?>', '<?php echo htmlentities($selectedSemester); ?>')">Upload Grade</button></td>
                                </tr>
                            <?php endforeach; ?>                 
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../../View/index.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Get the initial course and section
        var initialCourse = document.getElementById("CourseDropDown").value;
        var semester = document.getElementById("SemesterDropDown").value;

        // Check if semester is not set in URL
        if (!getParameterByName('semester')) {
            console.log('semester not set in URL');
            var semester = 'Spring';
            var course = document.getElementById("CourseDropDown").value;

            window.location.href = "teacher_submit_grade_controller.php?users_id=<?php echo htmlentities($userId); ?>&semester=" + encodeURIComponent(semester) + "&course=" + encodeURIComponent(course);
        }
        });
    </script>
</body>
</html>
