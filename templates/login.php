<?php
include "../controllers/auth/loginController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobQuest</title>
    <link rel="stylesheet" href="../asset/css/login.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">JobQuest</div>
            <div class="nav-links">
                <a href="login.php">Login</a>
                <a href="#">Signup</a>
            </div>
        </div>

        <div class="hero">
            <div class="hero-text">
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
                        Don't have an account? <a href="all-jobs.php">All jobs</a>
                    </div>
                </form>
            </div>
            <div class="hero-image">
                <img src="../asset/images/man-with-laptop.png" alt="Person with laptop">
            </div>
        </div>
    </div>
</body>

</html>


</html>