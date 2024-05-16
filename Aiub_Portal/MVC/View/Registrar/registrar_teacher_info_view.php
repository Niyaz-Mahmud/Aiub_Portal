<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../view/Styles.css">
    <!-- Internal CSS -->
    <style>
        .red-button {
            background-color: #ff2600;
            border: none;
            border-radius: 5px;
            color: #FFF;
            cursor: pointer;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .red-button:hover {
            background-color: #ff6347;
        }

        .teacher-box .red-button.disabled {
            background-color: gray;
            cursor: not-allowed; 
        }
    </style>
</head>
<body>
<div class="dashboard-header">
    <!-- Logo and University Information -->
    <div class="logo-container">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
        <div class="bar"></div>
        <div class="university-info">
            <div class="university-name">AIUB</div>
            <div class="tagline">Portal</div>
        </div>
    </div>
    <!-- User Information and Settings -->
    <div class="icons-container">
        <?php if(isset($welcomeMessage)): ?>
            <a href="registrar_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
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
<div class="dashboard-content">
    <div class="menu-options">
        <!-- Dashboard Menu Options -->
        <a href="registrar_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
        <a href="registrar_student_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_student_info' ? 'active' : ''; ?>"><i class="fas fa-user menu-icon"></i> Student Records</a>
        <a href="registrar_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Records</a>
        <a href="registrar_course_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_course_management' ? 'active' : ''; ?>"><i class="fas fa-book menu-icon"></i> Manage Courses</a>
        <a href="registrar_manage.user_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-users menu-icon"></i>Manage User</a>
        <a href="registrar_manage_library_resource_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_manage_library_resource' ? 'active' : ''; ?>"><i class="fas fa-book-open menu-icon"></i> Library Resource</a>
        <a href="registrar_leave_status_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_leave_status' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Apply Leave</a>
        <a href="registrar_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_payment' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payment</a>
    </div>

    <div class="container">
        <h2>Teacher Details</h2>
        <!-- Search Box -->
        <div class="search-box">
            <form action="registrar_teacher_info_controller.php" method="GET">
                <!-- Hidden input for user ID -->
                <input type="hidden" name="users_id" value="<?php echo htmlentities($userId); ?>">
                <!-- Search input -->
                <input type="text" id="searchInput" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
                <!-- Search button -->
                <button type="submit">Search</button>
            </form>
        </div>
        <!-- Teacher Table -->
        <table class="teacher-table">
            <thead>
                <tr>
                    <th style="width: 33%;">Teacher Id</th>
                    <th style="width: 33%;">Teacher Name</th>
                    <th style="width: 33%;">Department</th>
                    <th style="width: 33%;">Action</th>
                    <th style="width: 33%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($teachers !== null) {
                    foreach ($teachers as $teacher) {
                        echo "<tr>";
                        echo "<td>" . $teacher['id'] . "</td>";
                        echo "<td>" . $teacher['name'] . "</td>";
                        echo "<td>" . $teacher['department'] . "</td>";
                        echo "<td><button class='details-btn' onclick=\"redirectToTeacherDetails('{$userId}', '{$teacher['id']}')\">Details</button></td>";

                        if ($teacher['leaving_date'] === null) {
                            echo "<td><button class='red-button' onclick=\"leftTeacher('{$teacher['id']}', this); this.disabled = true; this.classList.add('disabled');\">Left</button></td>";
                        } else {
                            echo "<td><button class='red-button' disabled style='background-color: gray;'>Left</button></td>";
                        }

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No teachers found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <!-- No Matching Records Message -->
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

    <script src="../../View/index.js"></script>

</body>
</html>
