<?php
include "../../controllers/shared/searchController.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ont-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <form method="GET">
        <input type="search" id="search" name="search" placeholder="Search job here..." required>
        <button type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
</body>

</html>