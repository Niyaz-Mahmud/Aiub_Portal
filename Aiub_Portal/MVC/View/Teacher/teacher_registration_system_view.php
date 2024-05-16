<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration</title>
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

        <!-- Registration form -->
        <div class="registration-form">
            <h2>Course Registration</h2>
            <!-- Search box -->
            <div class="search-box">
                <form action="teacher_registration_system_controller.php" method="GET">
                    <!-- Hidden input for user ID -->
                    <input type="hidden" name="users_id" value="<?php echo htmlentities($userId); ?>">
                    <!-- Search input -->
                    <input type="text" id="searchInput" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
                    <!-- Search button -->
                    <button type="submit">Search</button>
                </form>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?users_id=<?php echo htmlentities($userId); ?>" method="POST">
                <div class="semester-selection">
                    <label for="semester">Select Semester:</label>
                    <!-- Semester selection dropdown -->
                    <select name="semester" id="semester">
                        <option value="Spring">Spring</option>
                        <option value="Fall">Fall</option>
                        <option value="Summer">Summer</option>
                    </select>
                </div>
                <?php if(isset($message)): ?>
                    <!-- Success message -->
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i> <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <!-- Table for displaying available courses -->
                <table id="courseTable"> 
                    <?php foreach ($availableCourses as $courseName => $sections): ?>
                        <tr>
                            <th colspan="3"><?php echo $courseName; ?></th>
                        </tr>
                        <?php foreach ($sections as $section): ?>
                            <tr>
                                <td>
                                    <label>
                                        <!-- Checkbox for course selection -->
                                        <input type="checkbox" name="courses[<?php echo $courseName . ' - ' . $section['section']; ?>]" value="<?php echo $courseName . ' - ' . $section['section']; ?>">
                                        <?php echo $courseName . " [" . $section['section'] . "]"; ?>
                                    </label>
                                </td>
                                <td><?php echo $section['day']; ?></td>
                                <td><?php echo $section['start_time'] . ' - ' . $section['end_time']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </table>
                <!-- Message for no matching records -->
                <p id="noMatchMessage" style="display: <?php echo (empty($availableCourses)) ? 'block' : 'none'; ?>">No matching records found.</p>
                <!-- Enroll button -->
                <button type="submit" id="enrollButton" class="submit-button">Enroll</button>
            </form>
            <!-- Pagination -->
            <div class="pagination">
                <?php
                // Calculate total pages
                $total_pages = getTotalPages($results_per_page);

                // Previous page link
                if ($page > 1) {
                    echo "<a href='?users_id=$userId&page=" . ($page - 1) . "'>&laquo; Previous</a>";
                }

                // Page links
                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page) {
                        echo "<span class='current-page'>$i</span>";
                    } else {
                        echo "<a href='?users_id=$userId&page=$i'>$i</a>";
                    }
                }

                // Next page link
                if ($page < $total_pages) {
                    echo "<a href='?users_id=$userId&page=" . ($page + 1) . "'>Next &raquo;</a>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- JavaScript for settings menu -->
    <script src="../../View/index.js"></script>

</body>
</html>
