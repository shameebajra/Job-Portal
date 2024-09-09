<?php
session_start();
include '../config/db.php';

//Redirects to the logged in page if the user is looged in 
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    // Retrieve user role from session
    $user_role = $_SESSION['role'];

    // Redirect user to the appropriate page based on their role
    if ($user_role == 'Company') {
        header("Location: ../views/company/adminDashboard.php");
        exit();
    } else if ($user_role == 'Job Seeker') {
        header("Location: ../views/job_seeker/userDashboard.php");
        exit();
    }
}

// Define variables and initialize with empty values
$username = $password = $confirm_password = $role = "";
$usernameErr  = $passwordErr = $confirm_passwordErr = $roleErr = "";

// Processing form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Username validation
    if (empty(trim($_POST["username"]))) {
        $usernameErr = "Username is required";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $usernameErr = "Username can only contain letters, numbers, and underscores";
    } else {
        // Check if the username already exists
        $sql = "SELECT id FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $usernameErr = "This username is already taken.";
            } else {
                $username = trim($_POST["username"]);
            }
            $stmt->close();
        }
    }


    // Password validation
    if (empty(trim($_POST['password']))) {
        $passwordErr = "Password cannot be empty.";
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $passwordErr = "Password cannot be less than 6 characters.";
    } else {
        $password = trim($_POST['password']);
    }

    // Confirm password validation
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_passwordErr = "Confirmation password is required";
    } elseif (trim($_POST["confirm_password"]) !== $password) {
        $confirm_passwordErr = "Passwords do not match.";
    }

    // Role validation
    if (empty($_POST['role'])) {
        $roleErr = "Please select a role.";
    } else {
        $role = trim($_POST["role"]);
    }

    // If no errors, proceed with inserting into the database
    if (empty($usernameErr) && empty($passwordErr) && empty($confirm_passwordErr) && empty($roleErr)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // prepare and bind
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $username, $hashed_password, $role);
            if ($stmt->execute()) {
                echo "Registration successful!";
                // Optionally redirect to the login page or dashboard
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    $conn->close();
}
