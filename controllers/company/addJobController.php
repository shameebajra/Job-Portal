<?php
session_start();
include '../../config/db.php';

//Redirect to the login page if not logged in
if (!isset($_SESSION['id'])) {
    header("location:../templates/login.php");
    exit();
}


// Define variables and set to empty values
$title = $description = $position = $location =
    $deadline = $salary = $experience = $education =
    $no_employee = $skills = $company_name = $job_type =
    $application_email = $application_url = $status =
    $remote_option = $category = $logo_url = "";

// For errors
$titleErr = $descriptionErr = $positionErr = $locationErr =
    $deadlineErr = $salaryErr = $experienceErr = $educationErr =
    $no_employeeErr = $skillsErr = $company_nameErr = $job_typeErr =
    $application_emailErr = $application_urlErr = $statusErr =
    $remote_optionErr = $categoryErr = $logo_urlErr = "";



// Get the admin_id from the session
$admin_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /**
     * Validations
     */
    // Title
    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
    } else {
        $title = testInput($_POST["title"]);
    }
    // Description
    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
    } else {
        $description = testInput($_POST["description"]);
    }
    // Position
    if (empty($_POST["position"])) {
        $positionErr = "Position is required";
    } else {
        $position = testInput($_POST["position"]);
    }
    // Location
    if (empty($_POST["location"])) {
        $locationErr = "Location is required";
    } else {
        $location = testInput($_POST["location"]);
    }
    // Deadline
    if (empty($_POST["deadline"])) {
        $deadlineErr = "Deadline is required";
    } else {
        $deadline = testInput($_POST["deadline"]);
    }
    // Salary
    if (empty($_POST["salary"])) {
        $salaryErr = "Salary is required";
    } else {
        $salary = testInput($_POST["salary"]);
    }
    // Experience
    if (empty($_POST["experience"])) {
        $experienceErr = "Experience is required";
    } else {
        $experience = testInput($_POST["experience"]);
    }
    // Education
    if (empty($_POST["education"])) {
        $educationErr = "Education is required";
    } else {
        $education = testInput($_POST["education"]);
    }
    // No_employee
    if (empty($_POST["no_employee"])) {
        $no_employeeErr = "No of employee is required";
    } else {
        $no_employee = testInput($_POST["no_employee"]);
    }
    // Skills
    if (empty($_POST["skills"])) {
        $skillsErr = "Skills is required";
    } else {
        $skills = testInput($_POST["skills"]);
    }
    // Company name
    if (empty($_POST["company_name"])) {
        $company_nameErr = "Company name is required";
    } else {
        $company_name = testInput($_POST["company_name"]);
    }
    // Job type
    if (empty($_POST["job_type"])) {
        $job_typeErr = "Job type is required";
    } else {
        $job_type = testInput($_POST["job_type"]);
    }
    // Application email
    if (empty($_POST["application_email"])) {
        $application_emailErr = "Application email is required";
    } else {
        $application_email = testInput($_POST["application_email"]);
    }
    // Application URL
    if (empty($_POST["application_url"])) {
        $application_urlErr = "Application URL is required";
    } else {
        $application_url = testInput($_POST["application_url"]);
    }
    // Status
    if (empty($_POST["status"])) {
        $statusErr = "Status is required";
    } else {
        $status = testInput($_POST["status"]);
    }
    // Remote option
    $remote_option = isset($_POST["remote_option"]) ? 1 : 0; // Ensure boolean value

    // Category
    if (empty($_POST["category"])) {
        $categoryErr = "Category is required";
    } else {
        $category = testInput($_POST["category"]);
    }
    // Logo URL
    if (empty($_POST["logo_url"])) {
        $logo_urlErr = "Logo URL is required";
    } else {
        $logo_url = testInput($_POST["logo_url"]);
    }

    // If no errors, insert data into the database using direct SQL query
    if (
        empty($titleErr) && empty($descriptionErr) && empty($positionErr) && empty($locationErr) &&
        empty($deadlineErr) && empty($salaryErr) && empty($experienceErr) && empty($educationErr) &&
        empty($no_employeeErr) && empty($skillsErr) && empty($company_nameErr) && empty($job_typeErr) &&
        empty($application_emailErr) && empty($application_urlErr) && empty($statusErr) &&
        empty($categoryErr) && empty($logo_urlErr)
    ) {
        // Sanitize inputs for sql defence mechanism 
        $title = $conn->real_escape_string($title);
        $description = $conn->real_escape_string($description);
        $position = $conn->real_escape_string($position);
        $location = $conn->real_escape_string($location);
        $deadline = $conn->real_escape_string($deadline);
        $salary = $conn->real_escape_string($salary);
        $experience = $conn->real_escape_string($experience);
        $education = $conn->real_escape_string($education);
        $no_employee = $conn->real_escape_string($no_employee);
        $skills = $conn->real_escape_string($skills);
        $company_name = $conn->real_escape_string($company_name);
        $job_type = $conn->real_escape_string($job_type);
        $application_email = $conn->real_escape_string($application_email);
        $application_url = $conn->real_escape_string($application_url);
        $status = $conn->real_escape_string($status);
        $category = $conn->real_escape_string($category);
        $logo_url = $conn->real_escape_string($logo_url);

        // Check if the user is logged in and `admin_id` is available in the session
        if (!isset($_SESSION['id'])) {
            die("Error: User is not logged in.");
        }

        $admin_id = $_SESSION['id'];

        // Prepare the sql statement
        $sql = "INSERT INTO jobs (admin_id, title, description, position, location, deadline, salary, experience, education, no_employee, skills, company_name, job_type, application_email, application_url, status, remote_option, category, logo_url)
        VALUES ('$admin_id', '$title', '$description', '$position', '$location', '$deadline', '$salary', '$experience', '$education', '$no_employee', '$skills', '$company_name', '$job_type', '$application_email', '$application_url', '$status', '$remote_option', '$category', '$logo_url')";

        //execute the sql statement
        if ($conn->query($sql) === TRUE) {
            echo "New job created successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$conn->close();
