<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title -->
    <title>Student Finance</title>
    <!-- External CSS files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../View/Styles.css">
</head>
<body>
    <!-- Dashboard header -->
    <div class="dashboard-header">
        <div class="logo-container">
            <!-- Logo image -->
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <div class="university-info">
                <!-- University name and tagline -->
                <div class="university-name">AIUB</div>
                <div class="tagline">Portal</div>
            </div>
        </div>
        <div class="icons-container">
            <?php if(isset($welcomeMessage)): ?>
                <!-- Welcome message for user -->
                <a href="hr_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
            <?php endif; ?>
            <!-- Settings and logout links -->
            <a href="#" class="setting-link"><i class="fas fa-cog icon"></i></a>
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
            <!-- Menu options with icons -->
            <a href="hr_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
            <a href="hr_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Information</a>
            <a href="hr_leave_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_leave_management' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Leave Management</a>
            <a href="hr_payroll_process_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_payroll_process' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payroll Processing</a>
            <a href="hr_student_financial_information_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_student_financial_information' ? 'active' : ''; ?>"><i class="fas fa-dollar-sign menu-icon"></i> Student Financial Info</a>
        </div>

        <div class="container">
            <!-- Heading for student financial details -->
            <h2>Student Financial Details</h2>

            <div class="search-box">
                <!-- Form for searching -->
                <form action="hr_student_financial_information_controller.php" method="GET">
                    <input type="hidden" name="users_id" value="<?php echo htmlentities($userId); ?>">
                    <input type="text" id="searchInput" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
                    <button type="submit">Search</button>
                </form>
            </div>

            <table class="student-financial-table">
                <thead>
                    <!-- Table headers -->
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Total Payment</th>
                        <th>Dues</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($studentFinancialDetails as $detail): ?>
                        <!-- Table rows with student financial details -->
                        <tr>
                            <td><?php echo $detail['Student_id']; ?></td>
                            <td><?php echo $detail['Student_name']; ?></td>
                            <td><?php echo $detail['Department']; ?></td>
                            <td><?php echo $detail['total_payment']; ?></td>
                            <td><?php echo $detail['total_dues']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Message for no matching records -->
            <p id="noMatchMessage" style="display: <?php echo (empty($studentFinancialDetails) && empty($registerInfo)) ? 'block' : 'none'; ?>; color: red;">No matching records found.</p>
            <div class="pagination">
                <?php
                // Pagination logic
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
