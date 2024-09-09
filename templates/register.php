<?php
include "../controllers/auth/registerController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../asset/css/register.css">


</head>

<body>
    <div class="container">
        <!-- <div class="logo">glumos</div> -->
        <h2>Registration</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <label for="username">Name</label>
                <input type="text" id="username" name="username" placeholder="Enter your name" required>
                <?php echo isset($usernameErr) ? '<p>' . htmlspecialchars($usernameErr) . '</p>' : ''; ?>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="username" name="password" placeholder="Create password" required>
                <?php echo isset($passwordErr) ? '<p>' . htmlspecialchars($passwordErr) . '</p>' : ''; ?>
            </div>

            <div class="input-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
                <?php echo isset($confirm_passwordErr) ? '<p>' . htmlspecialchars($confirm_passwordErr) . '</p>' : ''; ?>

            </div>
            <div class="input-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="Job Seeker">Job Seeker</option>
                    <option value="Company">Company</option>
                </select>
                <?php echo isset($roleErr) ? '<p>' . htmlspecialchars($roleErr) . '</p>' : ''; ?>
            </div>
            <button type="submit" class="button">Register Now</button>
        </form>
        <div class="form-footer">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </div>
    </div>
</body>

</html>