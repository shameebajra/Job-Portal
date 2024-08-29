<?php
session_start();


//Redirect to the login page if not loggedin 
if (!isset($_SESSION['id'])) {
    header("location:/job-portal/templates/login.php");
    exit();
}

include '../../config/db.php';

$sql = 'SELECT * FROM jobs';
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border=1>
     <tr>
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
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
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
                        <td><a href='/job-portal/views/job_seeker/applyJob.php?job_id=" . htmlspecialchars($row["job_id"] ?? '') . "'>Apply Job</a></td>
                      </tr>";
    }
    echo "</table>";
} else {
    echo "No jobs found.";
}
