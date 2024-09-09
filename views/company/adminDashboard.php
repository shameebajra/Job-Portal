<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location:../../templates/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>I am admin</h1>
    <form action="/job-portal/controllers/auth/logoutController.php">
        <button>Logout</button>
    </form>
    <a href="/job-portal/views/company/addJob.php">Add Job</a>
    <a href="/job-portal/controllers/company/viewJobController.php">View Job</a>
    <a href="/job-portal/templates/changePassword.php">Change Password</a>





</body>

</html>