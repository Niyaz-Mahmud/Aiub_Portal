<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Info</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../view/Styles.css">

    <!-- Internal CSS -->
    <style>
        .red-button {
            background-color: #ff2600;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .red-button:hover {
            background-color: #ff6347;
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
        <a href="registrar_manage.user_controller.php?users_id=<?php echo htmlentities($userId); ?>"><i class="fas fa-users menu-icon"></i>Manage User</a>
        <a href="registrar_manage_library_resource_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_manage_library_resource' ? 'active' : ''; ?>"><i class="fas fa-book-open menu-icon"></i> Library Resource</a>
        <a href="registrar_leave_status_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_leave_status' ? 'active' : ''; ?>"><i class="fas fa-calendar-alt menu-icon"></i> Apply Leave</a>
        <a href="registrar_payment_controller.php?users_id=<?php echo htmlentities($userId); ?>" class="<?php echo $currentPage === 'registrar_payment' ? 'active' : ''; ?>"><i class="fas fa-money-bill menu-icon"></i> Payment</a>
    </div>
    <!-- Change Account Form -->
    <div class="container">
        <div class="change-account-form">
            <h2>Change Account Info</h2>

            <!-- Success Message -->
            <?php if(isset($updateSuccessMessage)): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> <?php echo $updateSuccessMessage; ?>
                </div>
            <?php endif; ?>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $user = fetchUserDetails($userId, $id);

                if ($user) {
                    ?>
                    <!-- Account Details Form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <input type="text" id="role" name="role" value="<?php echo $user['role']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" id="password" name="password" value="<?php echo $user['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
                        </div>
                        <!-- Submit Button -->
                        <button class="submit-button" type="submit">Submit</button>
                        <!-- Delete Account Button -->
                        <button type="submit" class="red-button" name="delete">Delete Account</button>
                    </form>
                    <?php
                } else {
                    echo "No user found with the provided ID.";
                }
            } else {
                echo "ID parameter is missing in the URL.";
            }
            ?>
        </div>
    </div>
</div>

    <script src="../../View/index.js"></script>

</body>
</html>
