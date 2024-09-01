<?php
session_start();
include '../../config/db.php';

// Redirect to the login page if not logged in
if (!isset($_SESSION['id'])) {
    header("location:../templates/login.php");
    exit();
}

// Define variables and set to empty
$fullname = $email = $phonenumber = $cv = $linkedin = "";
$fullnameErr = $emailErr = $phonenumberErr = $cvErr = $linkedinErr = "";

// Get job_id from the form (POST request)
$job_id = isset($_POST['job_id']) ? intval($_POST['job_id']) : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation code...
    $fullname = testinput($_POST["fullname"]);
    $email = testinput($_POST["email"]);
    $phonenumber = testinput($_POST["phonenumber"]);
    $linkedin = testinput($_POST["linkedin"]);

    // File upload directory
    $target_dir = "../../uploads/"; // Adjust the path as necessary

    // Create the directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $cvFileName = $newCvFileName = "";

    if (!empty($_FILES["cv"]["name"])) {
        $cvFileName = basename($_FILES["cv"]["name"]);
        $targetFilePath = $target_dir . $cvFileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Generate a new filename with timestamp
        $timestamp = time();
        $newCvFileName = pathinfo($cvFileName, PATHINFO_FILENAME) . "_" . $timestamp . "." . $fileType;
        $targetFilePath = $target_dir . $newCvFileName;

        // Allowed file formats
        $allowTypes = array('pdf', 'doc', 'docx');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFilePath)) {
                $cv = $targetFilePath; // Save the file path to the database
            } else {
                $cvErr = "Sorry, there was an error uploading your file.";
            }
        } else {
            $cvErr = "Sorry, only PDF, DOC, and DOCX files are allowed.";
        }
    } else {
        $cvErr = "Please upload your CV.";
    }

    // Check if job_id is valid
    if ($job_id === 0) {
        die("Invalid job ID.");
    }

    // If no errors, proceed to insert into the database
    if (empty($fullnameErr) && empty($emailErr) && empty($phonenumberErr) && empty($cvErr)) {
        // Escaping special characters for SQL
        $fullname = $conn->real_escape_string($fullname);
        $email = $conn->real_escape_string($email);
        $phonenumber = $conn->real_escape_string($phonenumber);
        $linkedin = !empty($linkedin) ? $conn->real_escape_string($linkedin) : NULL;

        // SQL query to insert the CV details
        $sql = "INSERT INTO cvs (fullname, phonenumber, email, cv, linkedin, job_id) 
                VALUES ('$fullname', '$phonenumber', '$email', '$cv', " . ($linkedin ? "'$linkedin'" : "NULL") . ", $job_id)";

        if ($conn->query($sql) === TRUE) {
            header("location:../../controllers/job_seeker/viewJobController.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Function to sanitize input
function testinput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn->close();
