<?php
session_start();
include '../../config/db.php';

//Redirect to the login page if not logged in
if (!isset($_SESSION['id'])) {
    header("location:/job-portal/templates/login.php");
}

// Fetch all job entries from the database
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Position</th>
                <th>Location</th>
                <th>Deadline</th>
                <th>Salary</th>
                <th>Experience</th>
                <th>Education</th>
                <th>No. of Employees</th>
                <th>Skills</th>
                <th>Company Name</th>
                <th>Job Type</th>
                <th>Application Email</th>
                <th>Application URL</th>
                <th>Status</th>
                <th>Remote Option</th>
                <th>Category</th>
                <th>Logo URL</th>
                <th colspan='2'>Action</th>          
            </tr>";

    // Loop through each row and display it in the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["title"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . $row["position"] . "</td>
                <td>" . $row["location"] . "</td>
                <td>" . $row["deadline"] . "</td>
                <td>" . $row["salary"] . "</td>
                <td>" . $row["experience"] . "</td>
                <td>" . $row["education"] . "</td>
                <td>" . $row["no_employee"] . "</td>
                <td>" . $row["skills"] . "</td>
                <td>" . $row["company_name"] . "</td>
                <td>" . $row["job_type"] . "</td>
                <td>" . $row["application_email"] . "</td>
                <td>" . $row["application_url"] . "</td>
                <td>" . $row["status"] . "</td>
                <td>" . ($row["remote_option"] ? 'Yes' : 'No') . "</td>
                <td>" . $row["category"] . "</td>
                <td>" . $row["logo_url"] . "</td>
                <td><a href='/job-portal/views/admin/editJob.php?id=" . $row["id"] . "'>Edit</a></td>
                <td><a href='/job-portal/controllers/jobs/deleteJobController.php?id=" . $row["id"] . "' onclick=\"return confirm('Are you sure you want to delete this job?');\">Delete</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No jobs found.";
}

$conn->close();
