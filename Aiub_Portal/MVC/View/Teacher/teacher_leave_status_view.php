<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External CSS stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../View/Styles.css"> 
</head>
<body>
    <div class="dashboard-header">
        <div class="logo-container">
            <!-- University Logo -->
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <!-- University Info -->
            <div class="university-info">
                <div class="university-name">AIUB</div>
                <div class="tagline">Portal</div>
            </div>
        </div>
        <!-- Icons Container -->
        <div class="icons-container">
            <?php if(isset($welcomeMessage)): ?>
                <!-- Welcome Message -->
                <a href="teacher_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
            <?php endif; ?>
            <!-- Setting Icon -->
            <a href="#" class="setting-link"><i class="fas fa-cog icon"></i></a>
            <!-- Logout Link -->
            <a href="?logout=true" class="logout-link"><i class="fas fa-sign-out-alt icon"></i> Logout</a>
        </div>
    </div>
    <!-- Settings Menu -->
    <div class="settings-menu" id="settings-menu">
        <ul>
            <!-- Change Password Link -->
            <li><a href="../changepass_controller.php?users_id=<?php echo htmlentities($userId); ?>">Change Password</a></li>
        </ul>
    </div>
    <div class="dashboard-content">
        <!-- Menu Options -->
        <div class="menu-options">
            <!-- Menu Links -->
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
        <!-- Leave Details -->
        <div class="container">
            <h2>Leave Details</h2>
            <form action="teacher_request_leave_controller.php" method="get">
                <!-- Hidden Input Field for User ID -->
                <input type="hidden" name="users_id" value="<?php echo htmlspecialchars($userId); ?>">
                <!-- Apply Leave Button -->
                <button type="submit" class="apply-leave-btn">Apply Leave</button>
            </form>
            <!-- Leave Table -->
            <table class="leave-table">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Reason</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through query results and display leave details
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>"; 
                        echo "<td>" . $row['Department'] . "</td>"; 
                        echo "<td>" . $row['Reason'] . "</td>";
                        echo "<td>" . $row['StartDate'] . "</td>";
                        echo "<td>" . $row['EndDate'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>"; 
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="pagination">
                <?php
                $total_pages = getTotalPages($results_per_page);
                // Previous page link
                if ($page > 1) {
                    echo "<a href='?users_id=$userId&page=" . ($page - 1) . "'>&laquo; Previous</a>";
                }
                // Page numbers
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
    <!-- Script to handle settings menu visibility -->
    <script src="../../View/index.js"></script>

</body>
</html>
