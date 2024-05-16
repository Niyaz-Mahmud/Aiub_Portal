<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI';
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .change-password-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        .change-password-form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-weight: bold;
        }

        .input-group input {
            width: calc(100% - 50px);
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .password-input {
            position: relative;
        }

        .password-input input {
            padding-right: 30px;
        }

        .password-toggle-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }

        button {
            width: calc(100% - 10px);
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        button:before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            z-index: 0;
            transform: translate(-50%, -50%) scale(0);
        }

        button:hover:before {
            transform: translate(-50%, -50%) scale(2);
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }

        .logo-img {
            max-width: 100px;
            margin-right: 15px;
        }

        .bar {
            height: 80px;
            width: 3px;
            background-color: #3498db;
            margin-right: 15px;
        }

        .university-info {
            text-align: left;
        }

        .university-name {
            font-weight: bold;
            font-size: 18px;
            color: #3498db;
            margin-bottom: 5px;
        }

        .tagline {
            font-size: 14px;
            color: #777;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .success-message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="change-password-form">
        <div class="logo-container">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <div class="university-info">
                <div class="university-name">American International University - Bangladesh</div>
                <div class="tagline">--Where leaders are created</div>
            </div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?users_id=<?php echo htmlentities($_GET['users_id']); ?>" method="POST">
            <input type="hidden" name="users_id" value="<?php echo isset($_POST['users_id']) ? $_POST['users_id'] : (isset($_GET['users_id']) ? $_GET['users_id'] : ''); ?>">
            <h3>Change Password</h3>
            <div class="input-group">
                <label for="current_password">Current Password:</label>
                <div class="password-input">
                    <input type="password" id="current_password" name="current_password" placeholder="Enter your current password">
                    <span class="password-toggle-icon" onclick="togglePasswordVisibilityChangePassword('current_password')"><i class="far fa-eye"></i></span>
                </div>
            </div>
            <div class="input-group">
                <label for="new_password">New Password:</label>
                <div class="password-input">
                    <input type="password" id="new_password" name="new_password" placeholder="Enter your new password">
                    <span class="password-toggle-icon" onclick="togglePasswordVisibilityChangePassword('new_password')"><i class="far fa-eye"></i></span>
                </div>
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirm New Password:</label>
                <div class="password-input">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your new password">
                    <span class="password-toggle-icon" onclick="togglePasswordVisibilityChangePassword('confirm_password')"><i class="far fa-eye"></i></span>
                </div>
            </div>
            <button type="submit">Change Password</button>
        </form>
        <?php if(!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <?php if(!empty($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
    </div>

    <script src="../View/index.js"></script>

</body>
</html>