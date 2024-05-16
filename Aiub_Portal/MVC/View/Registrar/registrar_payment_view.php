<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Dashboard</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../view/Styles.css">
</head>
<body>
<div class="dashboard-header">
    <!-- Logo container -->
    <div class="logo-container">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
        <div class="bar"></div>
        <!-- University information -->
        <div class="university-info">
            <div class="university-name">AIUB</div>
            <div class="tagline">Portal</div>
        </div>
    </div>
    <!-- Icons container -->
    <div class="icons-container">
        <?php if(isset($welcomeMessage)): ?>
            <!-- Welcome message -->
            <a href="registrar_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
        <?php endif; ?>
        <!-- Setting link -->
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
<div class="dashboard-content">
    <div class="menu-options">
        <!-- Navigation links -->
        <a href="registrar_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
        <a href="registrar_student_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_student_info' ? 'active' : ''; ?>"><i class="fas fa-user menu-icon"></i> Student Records</a>
        <a href="registrar_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Records</a>
        <a href="registrar_course_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_course_management' ? 'active' : ''; ?>"><i class="fas fa-book menu-icon"></i> Manage Courses</a>
        <a href="registrar_manage.user_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-users menu-icon"></i>Manage User</a>
        <a href="registrar_manage_library_resource_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_manage_library_resource' ? 'active' : ''; ?>"><i class="fas fa-book-open menu-icon"></i> Library Resource</a>
        <a href="registrar_leave_status_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_leave_status' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Apply Leave</a>
        <a href="registrar_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_payment' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payment</a>
    </div>

    <!-- Container for payment history -->
    <div class="container">
        <h2>Payment History</h2>
        <!-- Payment table -->
        <table class="payment-table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Salary</th>
                    <th>Bonus</th>
                    <th>Total Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Function to compare months for sorting
                function compareMonths($a, $b) {
                    return strtotime($a['Month']) - strtotime($b['Month']);
                }

                // Sorting payments by month
                usort($payments, 'compareMonths');

                foreach ($payments as $payment):
                ?>
                    <tr>
                        <!-- Displaying payment details -->
                        <td><?php echo $payment['Month']; ?></td>
                        <td><?php echo $payment['Salary']; ?></td>
                        <td><?php echo $payment['Bonus']; ?></td>
                        <td><?php echo $payment['Total_salary']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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

    <!-- JavaScript -->
    <script src="../../View/index.js"></script>

</body>
</html>
