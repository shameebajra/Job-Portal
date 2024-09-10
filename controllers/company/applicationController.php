<?php
session_start();
include '../../config/db.php';

// Redirect to the login page if not logged in
if (!isset($_SESSION['id'])) {
    header("location:/job-portal/templates/login.php");
    exit(); // Ensure script execution stops after redirect
}

//getting the job id passed from post method
if (!isset($_GET['job_id'])) {
    echo "Job ID not provided.";
    exit();
}

$job_id = $_GET['job_id'];

// Fetch all CV entries from the database where job_id matches
$sql = "SELECT * FROM cvs WHERE job_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $job_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>CV</th>
                <th>LinkedIn</th>
            </tr>";

    // Loop through each row and display it in the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["fullname"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["phonenumber"] ?? 'N/A') . "</td>
                <td>" . htmlspecialchars($row["email"] ?? 'N/A') . "</td>
                <td><a href='/uploads" . htmlspecialchars($row["cv"] ?? '') . "' target='_blank'>View CV</a></td>
                <td>" . htmlspecialchars($row["linkedin"] ?? 'N/A') . "</td>
             </tr>";
    }
    echo "</table>";
} else {
    echo "No CVs found for this job.";
}

$stmt->close();
$conn->close();
