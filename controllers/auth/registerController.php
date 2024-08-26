<?php

//Redirects to the logged in page if the user is looged in 

session_start();

// Check if user is already logged in and if the user role is set in the session
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    $user_role = $_SESSION['role']; // Retrieve user role from session

    // Redirect user to the appropriate page
    if ($user_role == 'Admin') {
        header("location: ../views/admin/adminDashboard.php");
        exit();
    } else if ($user_role == 'User') {
        header("location: ../views/userDashboard.php");
        exit();
    }
}


include '../config/db.php';

// Define variables and initialize with empty values
$username = $password = $confirm_password = $role = "";
$username_err = $password_err = $confirm_password_err = $role_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check for username
    $input_username = trim($_POST["username"]);

    if (empty($input_username)) {
        $username_err = "Username is required";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $input_username)) {
        $username_err = "Username can only contain letters, numbers, and underscores";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set value to the param username
            $param_username = $input_username;

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = $input_username;
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
    }

    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = 'Password cannot be empty.';
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = 'Password cannot be less than 6 characters.';
    } else {
        $password = trim($_POST['password']);
    }

    // Check for confirmation password 
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Confirmation password is required";
    } elseif (trim($_POST["password"]) != trim($_POST["confirm_password"])) {
        $confirm_password_err = "Passwords should match";
    }

    // Check for role
    if (empty($_POST['role'])) {
        $role_err = "Select a role.";
    } else {
        $role = trim($_POST["role"]);
    }

    // Check for errors before inserting in the database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($role_err)) {
        // Hash password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $role);

        // Execute and check for errors
        if ($stmt->execute()) {
            echo "Registration Successful";
        } else {
            echo "Registration Unsuccessful: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
