<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Information</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../View/Styles.css">
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
        <!-- Icons Container -->
        <div class="icons-container">
            <!-- Welcome Message -->
            <?php if(isset($welcomeMessage)): ?>
                <a href="hr_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
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
            <li><a href="../changepass_controller.php?users_id=<?php echo htmlentities($userId); ?>">Change Password</a></li>
        </ul>
    </div>
    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <!-- Menu Options -->
        <div class="menu-options">
            <a href="hr_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
            <a href="hr_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Information</a>
            <a href="hr_leave_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_leave_management' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Leave Management</a>
            <a href="hr_payroll_process_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_payroll_process' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payroll Processing</a>
            <a href="hr_student_financial_information_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_student_financial_information' ? 'active' : ''; ?>"><i class="fas fa-dollar-sign menu-icon"></i> Student Financial Info</a>
        </div>

        <!-- Container for Teacher Details -->
        <div class="container">
            <h2>Teacher Details</h2>
            <!-- Search Box -->
            <div class="search-box">
            <form action="hr_teacher_info_controller.php" method="GET">
                <!-- Hidden Field for User ID -->
                <input type="hidden" name="users_id" value="<?php echo htmlentities($userId); ?>">
                <!-- Search Input Field -->
                <input type="text" id="searchInput" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
                <!-- Search Button -->
                <button type="submit">Search</button>
            </form>
            </div>

            <!-- Teacher Details Table -->
            <table class="teacher-table">
                <thead>
                    <tr>
                        <th style="width: 33%;">Teacher Id</th>
                        <th style="width: 33%;">Teacher Name</th>
                        <th style="width: 33%;">Department</th>
                        <th style="width: 33%;">Salary</th>
                        <th style="width: 33%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Display Teacher Details -->
                    <?php foreach ($teachers as $teacher) : ?>
                        <tr>
                            <td><?php echo $teacher['id']; ?></td>
                            <td><?php echo $teacher['name']; ?></td>
                            <td><?php echo $teacher['department']; ?></td>
                            <td><?php echo $teacher['salary']; ?></td>
                            <td><button class="details-btn" type="submit" onclick="redirectToHrTeacherDetails('<?php echo $teacher['id']; ?>', '<?php echo htmlentities($userId); ?>')">Details</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Display Message if No Matching Records Found -->
            <p id="noMatchMessage" style="display: <?php echo (empty($teachers)) ? 'block' : 'none'; ?>">No matching records found.</p>
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
