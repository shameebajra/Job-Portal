<?php
session_start();

// Redirect if the user is already logged in
if (isset($_SESSION['id']) && isset($_SESSION['role']) && isset($_SESSION['username'])) {
    $user_role = $_SESSION['role']; // Retrieve user role from session
    $username = $_SESSION['username']; // Retrieve username from session

    // Redirect user to the appropriate page based on their role
    if ($user_role == 'Admin') {
        header("Location: ../views/admin/adminDashboard.php");
        exit();
    } else if ($user_role == 'User') {
        header("Location: ../views/user/userDashboard.php");
        exit();
    }
}

// Continue with the login logic if not already logged in
require_once "../config/db.php";

// Initialize variables
$username = $password = $role = "";
$err = "";

// Handle login request
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Validate input
    if (empty(trim($_POST["username"])) || empty(trim($_POST["password"])) || empty(trim($_POST["role"]))) {
        $err = "Please enter all fields.";
    } else {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $role = trim($_POST["role"]);
    }

    // If there are no errors, proceed to check credentials
    if (empty($err)) {
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            // Execute statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                // Check if the username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $user_role);

                    if (mysqli_stmt_fetch($stmt)) {
                        // Check if the role matches
                        if ($role === $user_role) {
                            // Verify password
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, start a new session
                                session_start();

                                // Store data in session variables
                                $_SESSION["username"] = $username;
                                $_SESSION["id"] = $id;
                                $_SESSION["role"] = $user_role;
                                $_SESSION["loggedin"] = true;

                                // Redirect user to appropriate page
                                if ($role == 'Admin') {
                                    header("Location: ../views/admin/adminDashboard.php");
                                    exit();
                                } else if ($role == 'User') {
                                    header("Location: ../views/user/userDashboard.php");
                                    exit();
                                }
                                exit;
                            } else {
                                // Display an error message if password is not valid
                                $err = "The password you entered was not valid.";
                            }
                        } else {
                            // Display an error message if role does not match
                            $err = "The role does not match.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
}

// Display error message if there is any
if (!empty($err)) {
    echo $err;
}
