<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- <link rel="stylesheet" href="/job-portal/assets/css/style.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <style>
        body {
            background-color: white;
        }
    </style>

</head>

<body>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h1>Registration</h1>
            <input type="text" name="username" id="username" placeholder="Enter your name" required><br>
            <input type="email" name="email" id="email" placeholder="Enter your email" required><br>
            <input type="password" name="password" id="password" placeholder="Create password" required><br>
            <input type="password" name="confirm_password" id="repassword" placeholder="Confirm password" required><br>
            <select name="role" id="role">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <button type="submit">Register Now</button>
            <div class="footer-text">
                Already have an account? <a href="../templates/login.php">Login now</a>
            </div>
        </form>
    </div>
</body>
<?php
include "../controllers/auth/registerController.php";
?>

</html>