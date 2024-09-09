<?php
include "../controllers/auth/changePasswordController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Change password</h2>
        Current password<br>
        <input type="password" name="oldPassword" id="oldPassword"><br><br>

        New password<br>
        <input type="password" name="newPassword" id="newPassword"><br><br>
        Confirm password<br>
        <input type="password" name="confirmPassword" id="confirmPassword"><br><br>
        <input type="submit">
    </form>
</body>

</html>