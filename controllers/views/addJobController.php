<?php
include '../../config/db.php';

//define varaibale and set to empty values
$title = $description = $position = $location =
    $deadline = $salary = $experience = $education =
    $no_employee = $skills = $company_name = $job_type =
    $application_email = $application_url = $status =
    $remote_option = $category = $logo_url = "";
//for error
$titleErr = $descriptionErr = $positionErr = $locationErr =
    $deadlineErr = $salaryErr = $experienceErr = $educationErr =
    $no_employeeErr = $skillsErr = $company_nameErr = $job_typeErr =
    $application_emailErr = $application_urlErr = $statusErr =
    $remote_optionErr = $categoryErr = $logo_urlErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    //Position
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
    //Experience
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
    // Application Url
    if (empty($_POST["application_url"])) {
        $application_urlErr = "Application URL is required";
    } else {
        $application_url = testInput($_POST["application_url"]);
    }
    //Status
    if (empty($_POST["status"])) {
        $statusErr = "Status is required";
    } else {
        $status = testInput($_POST["status"]);
    }
    // Remote option
    if (empty($_POST["remote_option"])) {
        $remote_optionErr = "Remote option is required";
    } else {
        $remote_option = testInput($_POST["remote_option"]);
    }
    // Category
    if (empty($_POST["category"])) {
        $categoryErr = "Category is required";
    } else {
        $category = testInput($_POST["category"]);
    }
    // Logo Url
    if (empty($_POST["logo_url"])) {
        $logo_urlErr = "Logo is required";
    } else {
        $logo_url = testInput($_POST["logo_url"]);
    }
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
