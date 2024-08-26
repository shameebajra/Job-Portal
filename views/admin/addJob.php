<?php
include('../../controllers/views/addJobController.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Job</title>
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <h2>Create a Job</h2>

        <!-- Job Title -->
        <label for="title">Job Title:</label>
        <input type="text" name="title" id="title"><br>
        <?php echo $titleErr; ?><br>

        <!-- Job Description -->
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4"></textarea><br>
        <?php echo $descriptionErr; ?><br>


        <!-- Position -->
        <label for="position">Position:</label>
        <input type="text" name="position" id="position"><br>
        <?php echo $positionErr; ?><br>


        <!-- Location -->
        <label for="location">Location:</label>
        <input type="text" name="location" id="location"><br>
        <?php echo $locationErr; ?><br>


        <!-- Deadline -->
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline"><br>
        <?php echo $deadlineErr; ?><br>


        <!-- Salary -->
        <label for="salary">Salary:</label>
        <input type="number" step="0.01" name="salary" id="salary"><br>
        <?php echo $salaryErr; ?><br>


        <!-- Experience -->
        <label for="experience">Experience:</label>
        <input type="text" name="experience" id="experience"><br>
        <?php echo $experienceErr; ?><br>


        <!-- Education -->
        <label for="education">Education:</label>
        <input type="text" name="education" id="education"><br>
        <?php echo $educationErr; ?><br>


        <!-- Number of Employees -->
        <label for="no_employee">No. of Employees:</label>
        <input type="number" name="no_employee" id="no_employee"><br>
        <?php echo $no_employeeErr; ?><br>


        <!-- Skills -->
        <label for="skills">Skills:</label>
        <textarea name="skills" id="skills" rows="3"></textarea><br>
        <?php echo $skillsErr; ?><br>


        <!-- Company Name -->
        <label for="company_name">Company Name:</label>
        <input type="text" name="company_name" id="company_name"><br>
        <?php echo $company_nameErr; ?><br>


        <!-- Job Type -->
        <label for="job_type">Job Type:</label>
        <select name="job_type" id="job_type">
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Internship">Internship</option>
            <option value="Contract">Contract</option>
        </select><br>
        <?php echo $job_typeErr; ?><br>



        <!-- Application Email -->
        <label for="application_email">Application Email:</label>
        <input type="email" name="application_email" id="application_email"><br>
        <?php echo $application_emailErr; ?><br>


        <!-- Application URL -->
        <label for="application_url">Application URL:</label>
        <input type="url" name="application_url" id="application_url"><br>
        <?php echo $application_urlErr; ?><br>


        <!-- Job Status -->
        <label for="status">Job Status:</label>
        <select name="status" id="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Closed">Closed</option>
        </select><br>
        <?php echo $statusErr; ?><br>


        <!-- Remote Option -->
        <label for="remote_option">Remote Option:</label>
        <input type="checkbox" name="remote_option" id="remote_option" value="1"><br>
        <?php echo $remote_optionErr; ?><br>


        <!-- Job Category -->
        <label for="category">Job Category:</label>
        <input type="text" name="category" id="category"><br>
        <?php echo $categoryErr; ?><br>


        <!-- Company Logo URL -->
        <label for="logo_url">Company Logo URL:</label>
        <input type="url" name="logo_url" id="logo_url"><br>
        <?php echo $logo_urlErr; ?><br>


        <!-- Submit Button -->
        <button type="submit">Create Job</button>
    </form>
</body>

</html>