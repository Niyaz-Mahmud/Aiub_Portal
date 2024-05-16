<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Process</title>
    <!-- Link to Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link to common styles -->
    <link rel="stylesheet" href="../../View/Styles.css"> 
</head>
<body>
    <div class="dashboard-header">
        <div class="logo-container">
            <!-- Logo -->
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <div class="university-info">
                <!-- University Name -->
                <div class="university-name">AIUB</div>
                <!-- Tagline -->
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
            <li><a href="../../changepass_controller.php?users_id=<?php echo htmlentities($userId); ?>">Change Password</a></li>
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
        <div class="add-payroll-form">
            <h2>Add Payment</h2>
            <form id="payrollForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?users_id=<?php echo htmlentities($userId); ?>&row_id=<?php echo isset($_GET['row_id']) ? $_GET['row_id'] : ''; ?>">
                <div class="payroll-inputs">
                    <!-- Payroll form inputs -->
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name" placeholder="name" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>" readonly><br>
                    <label for="role">Role:</label><br>
                    <input type="text" name="role" id="role" placeholder="role" value="<?php echo isset($_GET['role']) ? htmlspecialchars($_GET['role']) : ''; ?>" readonly><br>
                    <label for="year">Year:</label>
                    <select name="year" id="year">
                    <?php 
                    $currentYear = date("Y");
                    echo "<option value=\"$currentYear\">$currentYear</option>";
                    ?>
                    </select>
                    <label for="month">Month:</label>
                    <select name="month" id="month">
                        <option value="">Select Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select><br>
                    <label for="salary">Salary:</label>
                    <input type="number" name="salary" id="salary" placeholder="salary" value="<?php echo isset($_GET['salary']) ? htmlspecialchars($_GET['salary']) : ''; ?>" readonly><br>
                    <label for="bonus">Bonus:</label>
                    <input type="number" name="bonus" id="bonus" placeholder="Bonus"><br>
                    <label for="total_salary">Total Salary:</label>
                    <input type="number" name="total_salary" id="total_salary" placeholder="Total Salary" readonly><br>
                    <button type="submit" class="upload-button">Insert</button><br>
                </div>
            </form>
        </div>
    </div>

        <script src="../../View/index.js"></script>

</body>
</html>
