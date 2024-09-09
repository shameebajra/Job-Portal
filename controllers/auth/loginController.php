<?php
session_start();

// Redirect if the user is already logged in
if (isset($_SESSION['id']) && isset($_SESSION['role']) && isset($_SESSION['username'])) {
    $user_role = $_SESSION['role']; // Retrieve user role from session

    // Redirect user to the appropriate page based on their role
    if ($user_role == 'Company') {
        header("Location: ../views/company/adminDashboard.php");
        exit();
    } elseif ($user_role == 'Job Seeker') {
        header("Location: ../views/job_seeker/userDashboard.php");
        exit();
    }
}

require_once "../config/db.php";

// Initialize variables
$username = $password = $role = "";
$usernameErr = $passwordErr = $roleErr = $loginErr = "";

// Handle login request
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = testInput($_POST["username"]);
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = testInput($_POST["password"]);
    }

    // Validate role
    if (empty($_POST["role"])) {
        $roleErr = "Role is required";
    } else {
        $role = testInput($_POST["role"]);
    }

    // If there are no input errors, check credentials
    if (empty($usernameErr) && empty($passwordErr) && empty($roleErr)) {
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = $username;

            // Execute statement
            if ($stmt->execute()) {
                $stmt->store_result();

                // Check if the username exists
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password, $user_role);

                    if ($stmt->fetch()) {
                        // Check if the role matches
                        if ($role === $user_role) {
                            // Verify password
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, start a new session and set values
                                $_SESSION["username"] = $username;
                                $_SESSION["id"] = $id;
                                $_SESSION["role"] = $user_role;
                                $_SESSION["loggedin"] = true;

                                // Redirect user to the appropriate page
                                if ($role == 'Company') {
                                    header("Location: ../views/company/adminDashboard.php");
                                } elseif ($role == 'Job Seeker') {
                                    header("Location: ../views/job_seeker/userDashboard.php");
                                }
                                exit();
                            } else {
                                $loginErr = "Invalid password.";
                            }
                        } else {
                            $loginErr = "The selected role does not match your account.";
                        }
                    }
                } else {
                    $loginErr = "No account found with that username.";
                }
            } else {
                $loginErr = "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
}

// Display error messages if any
if (!empty($usernameErr) || !empty($passwordErr) || !empty($roleErr) || !empty($loginErr)) {
    echo "<div class='error'>$usernameErr $passwordErr $roleErr $loginErr</div>";
}

// Function to sanitize inputs
function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn->close();
