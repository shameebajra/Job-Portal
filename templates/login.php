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


        <div class="hero">
            <div class="hero-text">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <h1>Login</h1>
                    <input type="text" name="username" id="username" placeholder="Enter your name" required>
                    <?php echo isset($usernameErr) ? '<p>' . htmlspecialchars($usernameErr) . '</p>' : ''; ?>

                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    <?php echo isset($passwordErr) ? '<p>' . htmlspecialchars($passwordErr) . '</p>' : ''; ?>

                    <select name="role" id="role">
                        <option value="Job Seeker">Job Seeker</option>
                        <option value="Company">Company</option>
                    </select>
                    <?php echo isset($roleErr) ? '<p>' . htmlspecialchars($roleErr) . '</p>' : ''; ?>

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