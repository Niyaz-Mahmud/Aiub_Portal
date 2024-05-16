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
            transition: background-color .3s;
        }

        .red-button:hover {
            background-color: #ff6347;
        }

        .red-button.disabled {
            background-color: gray;
        }
    </style>
</head>
<body>
    <div class="dashboard-header">
        <div class="logo-container">
            <!-- University Logo -->
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <div class="university-info">
                <!-- University Name and Tagline -->
                <div class="university-name">AIUB</div>
                <div class="tagline">Portal</div>
            </div>
        </div>
        <div class="icons-container">
            <?php if(isset($welcomeMessage)): ?>
                <!-- Welcome Message -->
                <a href="registrar_profile_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="welcome-user"><?php echo $welcomeMessage; ?></a>
            <?php endif; ?>
            <!-- Settings Icon -->
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

    <div class="dashboard-content">
        <!-- Menu Options -->
        <div class="menu-options">
            <!-- Dashboard Links -->
            <a href="registrar_dashboard_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_dashboard' ? 'active' : ''; ?>"><i class="fas fa-home menu-icon"></i> Home</a>
            <a href="registrar_student_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_student_info' ? 'active' : ''; ?>"><i class="fas fa-user menu-icon"></i> Student Records</a>
            <a href="registrar_teacher_info_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_teacher_info' ? 'active' : ''; ?>"><i class="fas fa-chalkboard-teacher menu-icon"></i> Teacher Records</a>
            <a href="registrar_course_management_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_course_management' ? 'active' : ''; ?>"><i class="fas fa-book menu-icon"></i> Manage Courses</a>
            <a href="registrar_manage.user_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-users menu-icon"></i> Manage User</a>
            <a href="registrar_manage_library_resource_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_manage_library_resource' ? 'active' : ''; ?>"><i class="fas fa-book-open menu-icon"></i> Library Resource</a>
            <a href="registrar_leave_status_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_leave_status' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Apply Leave</a>
            <a href="registrar_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_payment' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payment</a>
        </div>

        <!-- Container for Offered Courses -->
        <div class="container">
            <h2>Offered Courses</h2>
            <div class="search-box">
                <!-- Button to Add Course -->
                <button class="add-course-button" onclick="addCourse(<?php echo htmlentities($userId); ?>)">Add Course</button>
                <!-- Form for Search -->
                <form action="registrar_course_management_controller.php" method="GET">
                    <!-- Hidden input for user ID -->
                    <input type="hidden" name="users_id" value="<?php echo htmlentities($userId); ?>">
                    <!-- Search input -->
                    <input type="text" id="searchInput" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
                    <!-- Search button -->
                    <button type="submit">Search</button>
                    <!-- Button to Reset Count -->
                    <button onclick="resetCount()">Reset Count</button>
                </form>
            </div>

            <!-- Table for Courses -->
            <table id="coursestable" class="offered-courses-table">
                <thead>
                    <tr>
                        <th>Class ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Capacity</th>
                        <th>Count</th>
                        <th>day</th>
                        <th>Time</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($courses as $course) {
                        echo "<tr>";
                        echo "<td>" . $course["course_id"] . "</td>";
                        echo "<td>" . $course["course_name"] . " [" . $course["section"] . "]" . "</td>";
                        echo "<td>" . $course["status"] . "</td>";
                        echo "<td>" . $course["capacity"] . "</td>";
                        echo "<td>" . $course["count"] . "</td>";
                        echo "<td>" . $course["day"] . "</td>";
                        echo "<td>" . $course["start_time"] . " - " . $course["end_time"] . "</td>";
                    
                        if ($course["status"] == 'Closed') {
                            echo "<td><button class='red-button disabled-button'>Close</button></td>";
                            echo "<td><button class='open-button' onclick=\"openCourse('" . $course["course_id"] . "')\">Open</button></td>";
                        } else {
                            echo "<td><button class='red-button' onclick=\"closeCourse('" . $course["course_id"] . "')\">Close</button></td>";
                            echo "<td><button class='open-button disabled-button'>Open</button></td>";
                        }
                    
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- Message for No Matching Records -->
            <p id="noMatchMessage" style="display: <?php echo (empty($courses)) ? 'block' : 'none'; ?>">No matching records found.</p>

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
