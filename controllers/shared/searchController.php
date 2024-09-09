<?php

include "../../config/db.php";

session_start();

// Check if the search term was submitted
if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);

    // SQL query with placeholders for prepared statement
    $sql = "SELECT * FROM jobs WHERE title LIKE ? OR description LIKE ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Add wildcards to the search term for partial matching
    $searchTerm = "%" . $search . "%";

    // Bind the search term to both placeholders (for title and description columns)
    $stmt->bind_param("ss", $searchTerm, $searchTerm);


    $stmt->execute();


    $result = $stmt->get_result();

    // Check if any results were found
    if ($result->num_rows > 0) {
        // Loop through the results and display them
        while ($row = $result->fetch_assoc()) {
            echo "Job Title: " . $row["title"] . "<br>";
            echo "Description: " . $row["description"] . "<br><br>";
        }
    } else {
        echo "0 results";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No search term entered.";
}
