<?php
include('../../controllers/job_seeker/applyJobController.php');

// Retrieve job_id from the URL query string
$job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <h2>Apply for job</h2>
        <!-- Hidden field to store job id -->
        <input type="hidden" name="job_id" value="<?php echo htmlspecialchars($job_id); ?>">
        <?php echo "Job ID: $job_id"; ?>

        Full Name*<br>
        <input type="text" name="fullname" id="fullname" required><br><br>
        <?php echo isset($fullnameErr) ? '<p>' . htmlspecialchars($fullnameErr) . '</p>' : ''; ?>

        Email*<br>
        <input type="email" name="email" id="email" required><br><br>
        <?php echo isset($emailErr) ? '<p>' . htmlspecialchars($emailErr) . '</p>' : ''; ?>

        Phone Number*<br>
        <input type="text" name="phonenumber" id="phonenumber" required><br><br>
        <?php echo isset($phonenumberErr) ? '<p>' . htmlspecialchars($phonenumberErr) . '</p>' : ''; ?>

        CV*<br>
        <input type="file" name="cv" id="cv" required><br><br>
        <?php echo isset($cvErr) ? '<p>' . htmlspecialchars($cvErr) . '</p>' : ''; ?>

        LinkedIn<br>
        <input type="text" name="linkedin" id="linkedin"><br><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>