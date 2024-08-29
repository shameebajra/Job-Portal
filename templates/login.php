<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="/job-portal/assets/css/style.css"> -->
    <link rel="stylesheet" href="../asset/css/style.css">
    <style>
        body {
            background-color: white;
        }
    </style>



</head>

<body>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h1>Login</h1>
            <input type="text" name="username" id="username" placeholder="Enter your name" required><br>
            <input type="password" name="password" id="password" placeholder="Enter your password" required><br>
            <select name="role" id="role">
                <option value="Job Seeker">Job Seeker</option>
                <option value="Company">Company</option>
            </select>
            <button type="submit">Login Now</button>
            <div class="footer-text">
                Don't have an account? <a href="../templates/register.php">Register now</a>
            </div>
        </form>
    </div>
</body>
<?php
include "../controllers/auth/loginController.php";
?>

</html>