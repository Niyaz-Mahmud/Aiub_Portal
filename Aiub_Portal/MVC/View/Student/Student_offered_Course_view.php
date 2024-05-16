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

        <div class="container">
            <h2>Offered Courses</h2>
            <div class="search-box">
                <form action="Student_offered_Course_controller.php" method="GET">
                    <input type="hidden" name="users_id" value="<?php echo htmlentities($userId); ?>">
                    <input type="text" id="searchInput" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
                    <button type="submit">Search</button>
                </form>
            </div>

            <!-- Table to display offered courses -->
            <table id="coursestable" class="offered-courses-table">
                <thead>
                    <tr>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Status</th>
                        <th>Capacity</th>
                        <th>Count</th>
                        <th>Day</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["course_id"] . "</td>";
                            echo "<td>" . $row["course_name"] . " [" . $row["section"] . "]" . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td>" . $row["capacity"] . "</td>";
                            echo "<td>" . $row["count"] . "</td>";
                            echo "<td>" . $row["day"] . "</td>";
                            echo "<td>" . $row["start_time"] . " - " . $row["end_time"] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <!-- Message for no matching records found -->
            <p id="noMatchMessage" style="display: <?php echo (mysqli_num_rows($result) == 0) ? 'block' : 'none'; ?>">No matching records found.</p>
            <!-- Pagination for offered courses -->
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
