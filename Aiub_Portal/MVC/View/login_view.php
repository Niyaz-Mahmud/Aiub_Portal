<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        .login-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            position: relative;
        }

        .input-group {
            margin-bottom: 25px;
            text-align: left;
            position: relative;
        }

        .input-group label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-weight: bold;
        }

        .input-group input {
            width: calc(100% - 27px);
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            border-color: #3498db;
            outline: none;
        }

        .password-input input {
            padding-right: 30px;
        }

        .password-toggle-icon {
            position: absolute;
            right: 15px;
            top: 65%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
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
            z-index: -1; 
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

        .forgot-password {
            display: block;
            text-decoration: none;
            color: #3498db;
            font-size: 14px;
            margin-top: 10px;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #1e87e6;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .success-message {
            color: #4caf50;
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .success-message i {
            margin-right: 5px;
        }

        .show-password-icon {
            position: absolute;
            top: 70%;
            right: 20px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <div class="logo-container">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/American_International_University-Bangladesh_Monogram.svg/1200px-American_International_University-Bangladesh_Monogram.svg.png" alt="Logo" class="logo-img">
            <div class="bar"></div>
            <div class="university-info">
                <div class="university-name">American International University - Bangladesh</div>
                <div class="tagline">--Where leaders are created</div>
            </div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h5>Sign in with your organizational id number.</h5>
            <div class="input-group">
                <label for="users_id">User ID:</label>
                <input type="text" id="users_id" name="users_id" placeholder="Enter your User ID" value="<?php echo htmlspecialchars($users_id_cookie); ?>">
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <span class="show-password-icon" onclick="togglePasswordVisibility(this)">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
            <button type="submit">Login</button>
            <?php if(isset($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <?php if(isset($_SESSION['success_message'])): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    <p><?php echo $_SESSION['success_message']; ?></p>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

            <a href="forgetpass_controller.php" class="forgot-password">Forgot Password?</a>
        </form>
    </div>
    
    <script src="../View/index.js"></script>

    <script>
     
    </script>

</body>
</html>
