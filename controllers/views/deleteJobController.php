<?php
include '../../config/db.php';


//cehck if the id parameter is set in the URL
if (isset($_GET['id'])) {
    //get  the job ID from the url
    $job_id = intval($_GET['id']);

    //Prepare the delete statement   
    $sql = "DELETE FROM jobs where id =$job_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the page where the job list is displayed after deletion
        header("Location:/job-portal/controllers/views/viewJobController.php ");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // If no ID is provided in the URL, redirect back to the job list
    header("Location: /job-portal/controllers/views/viewJobController.php");
    exit();
}
$conn->close();
