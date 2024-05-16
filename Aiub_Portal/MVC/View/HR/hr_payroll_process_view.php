<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Common styles -->
    <link rel="stylesheet" href="../../View/Styles.css">
</head>
<body>
<div class="dashboard-header">
    <!-- University logo and info -->
    <div class="logo-container">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
        <div class="bar"></div>
        <div class="university-info">
            <div class="university-name">AIUB</div>
            <div class="tagline">Portal</div>
        </div>
    </div>
    <!-- User options -->
    <div class="icons-container">
        <?php if (isset($welcomeMessage)): ?>
            <a href="hr_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
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
        <a href="hr_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
        <a href="hr_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Information</a>
        <a href="hr_leave_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_leave_management' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Leave Management</a>
        <a href="hr_payroll_process_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_payroll_process' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payroll Processing</a>
        <a href="hr_student_financial_information_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_student_financial_information' ? 'active' : ''; ?>"><i class="fas fa-dollar-sign menu-icon"></i> Student Financial Info</a>
    </div>
    <!-- Payroll box -->
    <div class="container">
        <h2>Payroll Details</h2>
        <!-- Search box -->
        <div class="search-box">
            <form action="hr_payroll_process_controller.php" method="GET">
                <input type="hidden" name="users_id" value="<?php echo htmlentities($userId); ?>">
                <input type="text" id="searchInput" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <!-- Payroll table -->
        <form id="payrollForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table id="payroll-table" class="payroll-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- Loop through registerInfo -->
                <?php foreach ($registerInfo as $register): ?>
                    <tr>
                        <td><?php echo $register['RegisterID']; ?></td>
                        <td><?php echo $register['RegisterName']; ?></td>
                        <td><?php echo $register['salary']; ?></td>
                        <td>Register</td>
                        <!-- Add payment link for register -->
                        <td>
                            <a href="../HR/hr_add_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>&row_id=<?php echo $register['RegisterID']; ?>&role=Register&name=<?php echo urlencode($register['RegisterName']); ?>&salary=<?php echo $register['salary']; ?>" class="upload-button">Add Payment</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- Loop through teacherInfo -->
                <?php foreach ($teacherInfo as $teacher): ?>
                    <tr>
                        <td><?php echo $teacher['id']; ?></td>
                        <td><?php echo $teacher['name']; ?></td>
                        <td><?php echo $teacher['salary']; ?></td>
                        <td>Teacher</td>
                        <!-- Add payment link for teacher -->
                        <td>
                            <a href="../HR/hr_add_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>&row_id=<?php echo $teacher['id']; ?>&role=Teacher&name=<?php echo urlencode($teacher['name']); ?>&salary=<?php echo $teacher['salary']; ?>" class="upload-button">Add Payment</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <!-- No matching records message -->
            <p id="noMatchMessage" style="display: <?php echo (empty($registerInfo) && empty($teacherInfo)) ? 'block' : 'none'; ?>">No matching records found.</p>
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
        </form>
    </div>
</div>
    
    <script src="../../View/index.js"></script>

</body>
</html>
