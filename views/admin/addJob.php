<?php
include('../../controllers/jobs/addJobController.php');
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
        <!-- Hidden field for admin_id -->
        <input type="hidden" name="admin_id" value="<?php echo isset($admin_id) ? htmlspecialchars($admin_id) : ''; ?>">

        <!-- Job Title -->
        <label for="title">Job Title:</label>
        <input type="text" name="title" id="title" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>" required>
        <?php echo isset($titleErr) ? '<p>' . htmlspecialchars($titleErr) . '</p>' : ''; ?><br>

        <!-- Job Description -->
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
        <?php echo isset($descriptionErr) ? '<p>' . htmlspecialchars($descriptionErr) . '</p>' : ''; ?><br>

        <!-- Position -->
        <label for="position">Position:</label>
        <input type="text" name="position" id="position" value="<?php echo isset($_POST['position']) ? htmlspecialchars($_POST['position']) : ''; ?>" required>
        <?php echo isset($positionErr) ? '<p>' . htmlspecialchars($positionErr) . '</p>' : ''; ?><br>

        <!-- Location -->
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : ''; ?>" required>
        <?php echo isset($locationErr) ? '<p>' . htmlspecialchars($locationErr) . '</p>' : ''; ?><br>

        <!-- Deadline -->
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline" value="<?php echo isset($_POST['deadline']) ? htmlspecialchars($_POST['deadline']) : ''; ?>" required>
        <?php echo isset($deadlineErr) ? '<p>' . htmlspecialchars($deadlineErr) . '</p>' : ''; ?><br>

        <!-- Salary -->
        <label for="salary">Salary:</label>
        <input type="number" step="0.01" name="salary" id="salary" value="<?php echo isset($_POST['salary']) ? htmlspecialchars($_POST['salary']) : ''; ?>" required>
        <?php echo isset($salaryErr) ? '<p>' . htmlspecialchars($salaryErr) . '</p>' : ''; ?><br>

        <!-- Experience -->
        <label for="experience">Experience:</label>
        <input type="text" name="experience" id="experience" value="<?php echo isset($_POST['experience']) ? htmlspecialchars($_POST['experience']) : ''; ?>" required>
        <?php echo isset($experienceErr) ? '<p>' . htmlspecialchars($experienceErr) . '</p>' : ''; ?><br>

        <!-- Education -->
        <label for="education">Education:</label>
        <input type="text" name="education" id="education" value="<?php echo isset($_POST['education']) ? htmlspecialchars($_POST['education']) : ''; ?>" required>
        <?php echo isset($educationErr) ? '<p>' . htmlspecialchars($educationErr) . '</p>' : ''; ?><br>

        <!-- Number of Employees -->
        <label for="no_employee">No. of Employees:</label>
        <input type="number" name="no_employee" id="no_employee" value="<?php echo isset($_POST['no_employee']) ? htmlspecialchars($_POST['no_employee']) : ''; ?>" required>
        <?php echo isset($no_employeeErr) ? '<p>' . htmlspecialchars($no_employeeErr) . '</p>' : ''; ?><br>

        <!-- Skills -->
        <label for="skills">Skills:</label>
        <textarea name="skills" id="skills" rows="3" required><?php echo isset($_POST['skills']) ? htmlspecialchars($_POST['skills']) : ''; ?></textarea>
        <?php echo isset($skillsErr) ? '<p>' . htmlspecialchars($skillsErr) . '</p>' : ''; ?><br>

        <!-- Company Name -->
        <label for="company_name">Company Name:</label>
        <input type="text" name="company_name" id="company_name" value="<?php echo isset($_POST['company_name']) ? htmlspecialchars($_POST['company_name']) : ''; ?>" required>
        <?php echo isset($company_nameErr) ? '<p>' . htmlspecialchars($company_nameErr) . '</p>' : ''; ?><br>

        <!-- Job Type -->
        <label for="job_type">Job Type:</label>
        <select name="job_type" id="job_type" required>
            <option value="Full-time" <?php echo (isset($_POST['job_type']) && $_POST['job_type'] === 'Full-time') ? 'selected' : ''; ?>>Full-time</option>
            <option value="Part-time" <?php echo (isset($_POST['job_type']) && $_POST['job_type'] === 'Part-time') ? 'selected' : ''; ?>>Part-time</option>
            <option value="Internship" <?php echo (isset($_POST['job_type']) && $_POST['job_type'] === 'Internship') ? 'selected' : ''; ?>>Internship</option>
            <option value="Contract" <?php echo (isset($_POST['job_type']) && $_POST['job_type'] === 'Contract') ? 'selected' : ''; ?>>Contract</option>
        </select>
        <?php echo isset($job_typeErr) ? '<p>' . htmlspecialchars($job_typeErr) . '</p>' : ''; ?><br>

        <!-- Application Email -->
        <label for="application_email">Application Email:</label>
        <input type="email" name="application_email" id="application_email" value="<?php echo isset($_POST['application_email']) ? htmlspecialchars($_POST['application_email']) : ''; ?>" required>
        <?php echo isset($application_emailErr) ? '<p>' . htmlspecialchars($application_emailErr) . '</p>' : ''; ?><br>

        <!-- Application URL (Optional) -->
        <label for="application_url">Application URL:</label>
        <input type="url" name="application_url" id="application_url" value="<?php echo isset($_POST['application_url']) ? htmlspecialchars($_POST['application_url']) : ''; ?>">
        <?php echo isset($application_urlErr) ? '<p>' . htmlspecialchars($application_urlErr) . '</p>' : ''; ?><br>

        <!-- Job Status -->
        <label for="status">Job Status:</label>
        <select name="status" id="status">
            <option value="Active" <?php echo (isset($_POST['status']) && $_POST['status'] === 'Active') ? 'selected' : ''; ?>>Active</option>
            <option value="Inactive" <?php echo (isset($_POST['status']) && $_POST['status'] === 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
            <option value="Closed" <?php echo (isset($_POST['status']) && $_POST['status'] === 'Closed') ? 'selected' : ''; ?>>Closed</option>
        </select>
        <?php echo isset($statusErr) ? '<p>' . htmlspecialchars($statusErr) . '</p>' : ''; ?><br>

        <!-- Remote Option -->
        <label for="remote_option">Remote Option:</label>
        <input type="checkbox" name="remote_option" id="remote_option" value="1" <?php echo isset($_POST['remote_option']) ? 'checked' : ''; ?>>
        <?php echo isset($remote_optionErr) ? '<p>' . htmlspecialchars($remote_optionErr) . '</p>' : ''; ?><br>

        <!-- Job Category -->
        <label for="category">Job Category:</label>
        <input type="text" name="category" id="category" value="<?php echo isset($_POST['category']) ? htmlspecialchars($_POST['category']) : ''; ?>" required>
        <?php echo isset($categoryErr) ? '<p>' . htmlspecialchars($categoryErr) . '</p>' : ''; ?><br>

        <!-- Company Logo URL (Optional) -->
        <label for="logo_url">Company Logo URL:</label>
        <input type="url" name="logo_url" id="logo_url" value="<?php echo isset($_POST['logo_url']) ? htmlspecialchars($_POST['logo_url']) : ''; ?>">
        <?php echo isset($logo_urlErr) ? '<p>' . htmlspecialchars($logo_urlErr) . '</p>' : ''; ?><br>

        <!-- Submit Button -->
        <button type="submit">Create Job</button>
    </form>
</body>

</html>