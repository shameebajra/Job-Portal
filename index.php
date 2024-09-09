<?php
session_start();
// Check if user is already logged in and if the user role is set in the session
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    $user_role = $_SESSION['role']; // Retrieve user role from session

    // Redirect user to the appropriate page based on their role
    if ($user_role == 'Company') {
        header("Location: views/company/adminDashboard.php");
        exit();
    } else if ($user_role == 'Job Seeker') {
        header("Location: views/job_seeker/userDashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobQuest</title>
    <link rel="stylesheet" href="asset/css/index.css">

</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">JobQuest </div>
            <div class="nav-links">
                <a href="templates/login.php">Login</a>
                <a href="templates/register.php">Signup</a>
            </div>
        </div>

        <div class="hero">
            <div class="hero-text">
                <h1>Find freelance and fulltime developer jobs.</h1>
                <p>JobQuest is your one-stop-centre for thousands of digital freelance and fulltime jobs.</p>
                <div class="search-bar">
                    <input type="text" placeholder="Search a job">
                    <select>
                        <option value="freelance">Freelance</option>
                        <option value="fulltime">Fulltime</option>
                    </select>
                    <button>Search</button>
                </div>
            </div>
            <img src="asset/images/man-with-laptop.png" alt="Person with laptop">
        </div>
    </div>
</body>

</html>