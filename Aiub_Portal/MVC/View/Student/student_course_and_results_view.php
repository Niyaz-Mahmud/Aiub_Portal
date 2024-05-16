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
    <style>
        
        .result-container {
            margin: 20px auto;
            width: 40%;
            padding: 20px;
        }
        
        .panel {
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        
        .panel-heading {
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
            padding: 10px 15px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }
        
        .panel-title {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 16px;
            color: #333;
        }
        
        .panel-body {
            padding: 15px;
        }
        
        .list-group {
            margin-bottom: 0;
            padding-left: 0;
            list-style: none;
        }
        
        .list-group-item {
            position: relative;
            display: block;
            padding: 10px 15px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        
        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #337ab7;
            border-color: #337ab7;
        }
        
        .bg-info {
            background-color: #3498db;
            color: #fff;
            padding: 5px;
            margin-bottom: 10px;
        }
        
        .margin-left-20 {
            margin-left: 20px;
        }
        .margin-l5 {
            margin-left: 5px;
        }
        .margin-bottom-20 {
            margin-bottom: 20px;
        }
    </style>
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

    <!-- Result container -->
        <div class="result-container">
            <div class="row">
                <div id="main-content" class="col-md-9 col-xs-12">
                    <!-- Panel for displaying grade details -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Grades Marks Quizzes</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- Dropdowns for selecting course and semester -->
                                <div class="col-md-6 col-lg-6">
                                    <label class="label-height-30">Courses:</label>
                                    <!-- Dropdown for selecting course -->
                                    <select class="form-control" id="CourseDropDown" name="CourseDropDown" onchange="showCourseDetails(this.value)">
                                        <?php foreach ($courses as $course): ?>
                                            <option value="<?php echo htmlentities($course['course_name'] . ' [' . $course['section'] . ']'); ?>"><?php echo htmlentities($course['course_name'] . ' [' . $course['section'] . ']'); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <label class="label-height-30">Semesters:</label>
                                    <!-- Dropdown for selecting semester -->
                                    <select class="form-control" id="SemesterDropDown" name="SemesterDropDown" onchange="handleChangeSemester(this.value, '<?php echo htmlentities($userId); ?>')">
                                        <?php foreach ($semesters as $semester): ?>
                                            <option value="<?php echo htmlentities($semester); ?>" <?php if(isset($_GET["semester"]) && $_GET["semester"] == htmlentities($semester)) echo "selected"; ?>><?php echo htmlentities($semester); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br />
                            <br />
                            <!-- Container for displaying grade details -->
                            <div class="list-group" id="gradeDetails">
                                <!-- Grades will be loaded here based on the selected course -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="../../View/index.js"></script>

<script>

    function showCourseDetails(courseName) {
        var selectedCourse = courseName;
        var gradeContainer = document.getElementById("gradeDetails");
        var gradeHTML = "";

        <?php foreach ($grades as $grade): ?>
            if ("<?php echo $grade['course_name']; ?>" === selectedCourse) {
                gradeHTML += `
                    <div class="list-group-item active">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label for=""><?php echo $grade['course_name']; ?></label>
                                <br />
                                <em>Total Mark: 100; Passing Mark: 50; Contributes: 100%</em>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-4">
                                <em>Course Teacher(s):  <?php echo $grade['teacher_name']; ?></em>
                            </div>
                            <div class="col-md-4 col-sm-4 text-right">
                                <h3><?php echo $grade['total_grade']; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="margin-l5 list-group-item">
                            <div class="row bg-info">
                                <div class="col-md-8">
                                    <h4>Midterm<small><em>(Total:100; Pass:50; Contributes:40%)</em></small></h4>
                                </div>
                                <div class="col-md-4 text-right">
                                    <h3><?php echo $grade['mid_grade']; ?></h3>
                                </div>
                            </div>

                            <div class="margin-left-20">
                                <div class="row">
                                   
                                </div>
                                <div class="margin-left-20">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5> Attendance<br/>
                                                <small>
                                                    (Total:10; Pass:5; Contributes:10%)
                                                </small></h5>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <h5>
                                            <?php echo $grade['mid_attendance']; ?>
                                            </h5>
                                        </div>
                                    </div>

                           
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5>Quizzes<br> <small>(Total:20; Pass:10; Contributes:20%)</small></h5>
                                        </div>
                                        <div class="col-md-4 text-right">
                                           
                                            <h5><?php echo $grade['mid_best_quiz']; ?></h5>
                                            
                                        </div>
                                    </div>

                                    <div class="margin-left-20">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <small>Quiz-1</small></><br>
                                                <small>(Total:20; Pass:10; Contributes:100%)</small>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <h5><?php echo $grade['mid_quiz1']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <small>Quiz-2</small></><br>
                                                <small>(Total:20; Pass:10; Contributes:100%)</small>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <h5><?php echo $grade['mid_quiz2']; ?></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5> Assignment<br/>
                                                <small>
                                                    (Total:30; Pass:15; Contributes:30%)
                                                </small></h5>
                                        </div>
                                        <div class="col-md-4 text-right">
                                        <h5><?php echo $grade['mid_assignment']; ?></h5>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5> Written Exam<br/>
                                                <small>
                                                    (Total:40; Pass:20; Contributes:40%)
                                                </small></h5>
                                        </div>
                                        <div class="col-md-4 text-right">
                                        <h5><?php echo $grade['mid_written']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="margin-l5 list-group-item">
                            <div class="row bg-info">
                                <div class="col-md-8">
                                    <h4>FinalTerm<small><em>(Total:100; Pass:50; Contributes:60%)</em></small></h4>
                                </div>
                                <div class="col-md-4 text-right">
                                    <h3><?php echo $grade['final_grade']; ?></h3>
                                </div>
                            </div>

                            <div class="margin-left-20">
                                <div class="row">
                                   
                                </div>
                                <div class="margin-left-20">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5> Attendance<br/>
                                                <small>
                                                    (Total:10; Pass:5; Contributes:10%)
                                                </small></h5>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <h5>
                                            <?php echo $grade['final_attendance']; ?>
                                            </h5>
                                        </div>
                                    </div>

                         
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5>Quizzes<br> <small>(Total:20; Pass:10; Contributes:20%)</small></h5>
                                        </div>
                                        <div class="col-md-4 text-right">
                                        <h5><?php echo $grade['final_best_quiz']; ?></h5>
                                        </div>
                                    </div>

                                    <div class="margin-left-20">
                                        <div class="row">
                                        <div class="col-md-8">
                                                <small>Quiz-1</small></><br>
                                                <small>(Total:20; Pass:10; Contributes:100%)</small>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <h5><?php echo $grade['final_quiz1']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-8">
                                                <small>Quiz-2</small></><br>
                                                <small>(Total:20; Pass:10; Contributes:100%)</small>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <h5><?php echo $grade['final_quiz2']; ?></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5> Assignment<br/>
                                                <small>
                                                    (Total:30; Pass:15; Contributes:30%)
                                                </small></h5>
                                        </div>
                                        <div class="col-md-4 text-right">
                                        <h5><?php echo $grade['final_assignment']; ?></h5>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5> Written Exam<br/>
                                                <small>
                                                    (Total:40; Pass:20; Contributes:40%)
                                                </small></h5>
                                        </div>
                                        <div class="col-md-4 text-right">
                                        <h5><?php echo $grade['final_written']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                `;
            }
        <?php endforeach; ?>
         if (gradeHTML === "") {
        gradeHTML = "<p>No grade found for this course.</p>";
    }
        gradeContainer.innerHTML = gradeHTML;
    }

</script>

</body>
</html>
