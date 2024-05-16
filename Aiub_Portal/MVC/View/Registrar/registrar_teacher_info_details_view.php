<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../view/Styles.css">
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
        <!-- Teacher Information Table -->
        <table class="Teacher-info-table">
            <?php if(isset($message)): ?>
                <!-- Success Message -->
                <div class="success-message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <tr>
                <th colspan="3">Teacher Information</th>
            </tr>
            <?php if (!empty($teacher_info)): ?>
                <form method='post' action=''>
                    <!-- Teacher Details -->
                    <tr>
                        <td><strong>ID</strong></td><td>:</td><td><span id='id'><?php echo $teacher_info['id']; ?></span></td>
                    </tr>
                    <!-- Editable Fields -->
                    <tr>
                        <td><strong>Name</strong></td><td>:</td><td><input type='text' id='name' name='name' value='<?php echo $teacher_info['name']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Father's Name</strong></td><td>:</td><td><input type='text' id='fathername' name='fathername' value='<?php echo $teacher_info['fathername']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Mother's Name</strong></td><td>:</td><td><input type='text' id='mothername' name='mothername' value='<?php echo $teacher_info['mothername']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>DOB</strong></td><td>:</td><td><input type='date' id='dob' name='dob' value='<?php echo $teacher_info['dob']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Sex</strong></td><td>:</td><td>
                            <select name='sex'>
                                <option value='Male' <?php if ($teacher_info['sex'] === 'Male') echo 'selected'; ?>>Male</option>
                                <option value='Female' <?php if ($teacher_info['sex'] === 'Female') echo 'selected'; ?>>Female</option>
                                <option value='Other' <?php if ($teacher_info['sex'] === 'Other') echo 'selected'; ?>>Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td><td>:</td><td><input type='text' name='address' value='<?php echo $teacher_info['address']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Religion</strong></td><td>:</td><td>
                            <select name='religion'>
                                <option value='Christian' <?php if ($teacher_info['religion'] === 'Christian') echo 'selected'; ?>>Christian</option>
                                <option value='Muslim' <?php if ($teacher_info['religion'] === 'Muslim') echo 'selected'; ?>>Muslim</option>
                                <option value='Hindu' <?php if ($teacher_info['religion'] === 'Hindu') echo 'selected'; ?>>Hindu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Marital Status</strong></td><td>:</td><td>
                            <select name='marital_status'>
                                <option value='Single' <?php if ($teacher_info['marital_status'] === 'Single') echo 'selected'; ?>>Single</option>
                                <option value='Married' <?php if ($teacher_info['marital_status'] === 'Married') echo 'selected'; ?>>Married</option>
                                <option value='Divorced' <?php if ($teacher_info['marital_status'] === 'Divorced') echo 'selected'; ?>>Divorced</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Nationality</strong></td><td>:</td><td><input type='text' id='nationality' name='nationality' value='<?php echo $teacher_info['nationality']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Blood Group</strong></td><td>:</td><td><input type='text' id='blood_group' name='blood_group' value='<?php echo $teacher_info['blood_group']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td><td>:</td><td><input type='text' name='phone' value='<?php echo $teacher_info['phone']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td><td>:</td><td><input type='text' name='email' value='<?php echo $teacher_info['email']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Joining Date</strong></td><td>:</td><td><input type='date' id='joining_date' name='joining_date' value='<?php echo $teacher_info['joining_date']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Leaving Date</strong></td><td>:</td><td><input type='date' id='leaving_date' name='leaving_date' value='<?php echo $teacher_info['leaving_date']; ?>'></td>
                    </tr>
                    <tr>
                        <td><strong>Department</strong></td><td>:</td><td>
                            <select name='department'>
                                <option value='Computer Science' <?php if ($teacher_info['department'] === 'Computer Science') echo 'selected'; ?>>Computer Science</option>
                                <option value='Electrical Engineering' <?php if ($teacher_info['department'] === 'Electrical Engineering') echo 'selected'; ?>>Electrical Engineering</option>
                                <option value='Mechanical Engineering' <?php if ($teacher_info['department'] === 'Mechanical Engineering') echo 'selected'; ?>>Mechanical Engineering</option>
                            </select>
                        </td>
                    </tr>
                    <input type='hidden' name='id' value='<?php echo $teacher_info['id']; ?>'>
                    <tr><td colspan='3'><button type='submit' name='submit' class='submit-button'>Update</button></td></tr>
                </form>
            <?php else: ?>
                <tr>
                    <td colspan="3">No teacher found with the specified ID.</td>
                </tr>
            <?php endif; ?>
        </table>

    </div>    
</div>

    <script src="../../View/index.js"></script>

</body>
</html>