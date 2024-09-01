<?php
include "../config/db.php"; // Include the database connection

session_start(); // Start the session to use session variables

// Redirect to login page if not logged in
if (!isset($_SESSION['id'])) {
    header("location:../templates/login.php");
    exit();
}

// Initialize variables for input and error messages
$oldPassword = $newPassword = $confirmPassword = "";
$oldPasswordErr = $newPasswordErr = $confirmPasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if the form is submitted via POST

    // Get input values
    $oldPassword = $_POST["oldPassword"] ?? '';
    $newPassword = $_POST["newPassword"] ?? '';
    $confirmPassword = $_POST["confirmPassword"] ?? '';

    // Validate old password
    if (empty($oldPassword)) {
        $oldPasswordErr = "Old Password is required";
    } else {
        $oldPassword = testInput($oldPassword);

        $userId = $_SESSION['id']; // Get the user ID from the session
        $sql = "SELECT password FROM users WHERE id = $userId"; // Query to get stored password
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        // Verify if the entered password matches the existing password
        if (!$row || !password_verify($oldPassword, $row['password'])) {
            $oldPasswordErr = "Old password is incorrect";
        }
    }

    // Validate new password
    if (empty($newPassword)) {
        $newPasswordErr = "New Password is required";
    } else {
        $newPassword = testInput($newPassword);
    }

    // Validate confirmation password
    if (empty($confirmPassword)) {
        $confirmPasswordErr = "Confirmation password is required.";
    } else {
        $confirmPassword = testInput($confirmPassword);

        if ($confirmPassword !== $newPassword) {
            $confirmPasswordErr = "Confirmation password does not match the new password.";
        }
    }

    // If no errors, change the password
    if (empty($oldPasswordErr) && empty($newPasswordErr) && empty($confirmPasswordErr)) {
        $hashed_newPassword = password_hash($newPassword, PASSWORD_BCRYPT); // Hash the new password
        $stmt = $conn->query("UPDATE users SET password='$hashed_newPassword' WHERE id = $userId"); // Execute the update query

        if ($stmt) {
            echo "Password updated successfully.";
        } else {
            echo "Failed to update the password.";
        }
    } else {
        // Display errors (optional)
        echo $oldPasswordErr . "<br>" . $newPasswordErr . "<br>" . $confirmPasswordErr;
    }
}

// Function to sanitize user input
function testInput($data)
{
    $data = trim($data); // Remove whitespace from the beginning and end
    $data = stripslashes($data); // Remove backslashes (\)
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}

$conn->close(); //Close DB connection
