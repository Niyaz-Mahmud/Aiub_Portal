<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Common styles -->
    <link rel="stylesheet" href="../../View/Styles.css">
</head>
<body>
    <div class="dashboard-header">
        <div class="logo-container">
            <!-- University logo -->
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <div class="university-info">
                <!-- University name -->
                <div class="university-name">AIUB</div>
                <!-- Portal tagline -->
                <div class="tagline">Portal</div>
            </div>
        </div>
        <div class="icons-container">
            <!-- Welcome message -->
            <?php if(isset($welcomeMessage)): ?>
                <a href="hr_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
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
            <li><a href="../changepass_controller.php?users_id=<?php echo htmlentities($userId); ?>">Change Password</a></li>
        </ul>
    </div>

    <div class="dashboard-content">
        <div class="menu-options">
            <!-- Dashboard menu options -->
            <a href="hr_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
            <a href="hr_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Information</a>
            <a href="hr_leave_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_leave_management' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Leave Management</a>
            <a href="hr_payroll_process_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_payroll_process' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payroll Processing</a>
            <a href="hr_student_financial_information_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'hr_student_financial_information' ? 'active' : ''; ?>"><i class="fas fa-dollar-sign menu-icon"></i> Student Financial Info</a>
        </div>

        <div class="container">
            <h2>Leave Details</h2>

            <div class="search-box"> 
                <!-- Search form -->
                <form action="hr_leave_management_controller.php" method="GET">
                    <input type="hidden" name="users_id" value="<?php echo htmlentities($userId); ?>">
                    <input type="text" id="searchInput" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
                    <button type="submit">Search</button>
                </form>
            </div>

            <!-- Leave table -->
            <table class="leave-table">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Reason</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP loop to display leave records -->
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['Department'] . "</td>";
                        echo "<td>" . $row['Reason'] . "</td>";
                        echo "<td>" . $row['StartDate'] . "</td>";
                        echo "<td>" . $row['EndDate'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>";
                        if ($row['status'] != 'Accepted') {
                            echo "<form method='post' action=''>";
                            echo "<input type='hidden' name='leave_id' value='" . $row['Leave_ID'] . "'>";
                            echo "<button type='submit' class='accept-btn' name='accept_leave'>Accept</button>";
                            echo "</form>";
                        } else {
                            echo "<button class='accept-btn' disabled>Accepted</button>";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- Message for no matching records -->
            <p id="noMatchMessage" style="display: <?php echo (mysqli_num_rows($result) == 0 && isset($searchTerm)) ? 'block' : 'none'; ?>; ">No matching records found.</p>

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

        <script src="../../View/index.js"></script>

</body>
</html>
