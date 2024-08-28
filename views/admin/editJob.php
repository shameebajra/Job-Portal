<?php include('../../controllers/jobs/editJobController.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job</title>
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . htmlspecialchars($job_id); ?>">
        <h2>Edit Job</h2>

        <!-- hidden field to store job id -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($job_id); ?>">

        <!-- Job Title -->
        <label for="title">Job Title:</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" required><br>

        <!-- Job Description -->
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required><?php echo htmlspecialchars($description); ?></textarea><br>
        <?php echo $descriptionErr; ?><br>

        <!-- Position -->
        <label for="position">Position:</label>
        <input type="text" name="position" id="position" value="<?php echo htmlspecialchars($position); ?>" required><br>
        <?php echo $positionErr; ?><br>

        <!-- Location -->
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="<?php echo htmlspecialchars($location); ?>" required><br>
        <?php echo $locationErr; ?><br>

        <!-- Deadline -->
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline" value="<?php echo htmlspecialchars($deadline); ?>" required><br>
        <?php echo $deadlineErr; ?><br>

        <!-- Salary -->
        <label for="salary">Salary:</label>
        <input type="number" step="0.01" name="salary" id="salary" value="<?php echo htmlspecialchars($salary); ?>" required><br>
        <?php echo $salaryErr; ?><br>

        <!-- Experience -->
        <label for="experience">Experience:</label>
        <input type="text" name="experience" id="experience" value="<?php echo htmlspecialchars($experience); ?>" required><br>
        <?php echo $experienceErr; ?><br>

        <!-- Education -->
        <label for="education">Education:</label>
        <input type="text" name="education" id="education" value="<?php echo htmlspecialchars($education); ?>" required><br>
        <?php echo $educationErr; ?><br>

        <!-- Number of Employees -->
        <label for="no_employee">No. of Employees:</label>
        <input type="number" name="no_employee" id="no_employee" value="<?php echo htmlspecialchars($no_employee); ?>" required><br>
        <?php echo $no_employeeErr; ?><br>

        <!-- Skills -->
        <label for="skills">Skills:</label>
        <textarea name="skills" id="skills" rows="3" required><?php echo htmlspecialchars($skills); ?></textarea><br>
        <?php echo $skillsErr; ?><br>

        <!-- Company Name -->
        <label for="company_name">Company Name:</label>
        <input type="text" name="company_name" id="company_name" value="<?php echo htmlspecialchars($company_name); ?>" required><br>
        <?php echo $company_nameErr; ?><br>

        <!-- Job Type -->
        <label for="job_type">Job Type:</label>
        <select name="job_type" id="job_type" required>
            <option value="Full-time" <?php if ($job_type == 'Full-time') echo 'selected'; ?>>Full-time</option>
            <option value="Part-time" <?php if ($job_type == 'Part-time') echo 'selected'; ?>>Part-time</option>
            <option value="Internship" <?php if ($job_type == 'Internship') echo 'selected'; ?>>Internship</option>
            <option value="Contract" <?php if ($job_type == 'Contract') echo 'selected'; ?>>Contract</option>
        </select><br>
        <?php echo $job_typeErr; ?><br>

        <!-- Application Email -->
        <label for="application_email">Application Email:</label>
        <input type="email" name="application_email" id="application_email" value="<?php echo htmlspecialchars($application_email); ?>" required><br>
        <?php echo $application_emailErr; ?><br>

        <!-- Application URL (Optional) -->
        <label for="application_url">Application URL:</label>
        <input type="url" name="application_url" id="application_url" value="<?php echo htmlspecialchars($application_url); ?>"><br>
        <?php echo $application_urlErr; ?><br>

        <!-- Job Status -->
        <label for="status">Job Status:</label>
        <select name="status" id="status">
            <option value="Active" <?php if ($status == 'Active') echo 'selected'; ?>>Active</option>
            <option value="Inactive" <?php if ($status == 'Inactive') echo 'selected'; ?>>Inactive</option>
            <option value="Closed" <?php if ($status == 'Closed') echo 'selected'; ?>>Closed</option>
        </select><br>
        <?php echo $statusErr; ?><br>

        <!-- Remote Option -->
        <label for="remote_option">Remote Option:</label>
        <input type="checkbox" name="remote_option" id="remote_option" value="1" <?php if ($remote_option == 1) echo 'checked'; ?>><br>
        <?php echo $remote_optionErr; ?><br>

        <!-- Job Category -->
        <label for="category">Job Category:</label>
        <input type="text" name="category" id="category" value="<?php echo htmlspecialchars($category); ?>" required><br>
        <?php echo $categoryErr; ?><br>

        <!-- Company Logo URL (Optional) -->
        <label for="logo_url">Company Logo URL:</label>
        <input type="url" name="logo_url" id="logo_url" value="<?php echo htmlspecialchars($logo_url); ?>"><br>
        <?php echo $logo_urlErr; ?><br>

        <!-- Submit Button -->
        <button type="submit">Edit Job</button>
    </form>
</body>

</html>