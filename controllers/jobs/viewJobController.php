<?php
session_start();
include '../../config/db.php';

// Redirect to the login page if not logged in
if (!isset($_SESSION['id'])) {
    header("location:/job-portal/templates/login.php");
    exit(); // Ensure script execution stops after redirect
}

// Get the admin_id from the session
$admin_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Check if admin_id is not null
if ($admin_id === null) {
    echo "Admin ID is not set.";
    exit();
}

// Fetch all job entries from the database where admin_id matches
$sql = "SELECT * FROM jobs WHERE admin_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>Job ID</th>
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
                <td>" . htmlspecialchars($row["job_id"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["title"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["description"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["position"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["location"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["deadline"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["salary"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["experience"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["education"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["no_employee"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["skills"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["company_name"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["job_type"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["application_email"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["application_url"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["status"] ?? 'N/A') . "</td>
                <td>" . ($row["remote_option"] ? 'Yes' : 'No') . "</td>
                <td>" . htmlspecialchars($row["category"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["logo_url"] ?? 'N/A') . "</td>
                <td><a href='/job-portal/views/admin/editJob.php?id=" . htmlspecialchars($row["job_id"] ?? '') . "'>Edit</a></td>
                <td><a href='/job-portal/controllers/jobs/deleteJobController.php?id=" . htmlspecialchars($row["job_id"] ?? '') . "' onclick=\"return confirm('Are you sure you want to delete this job?');\">Delete</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No jobs found.";
}

$stmt->close();
$conn->close();
