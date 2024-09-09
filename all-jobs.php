<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link rel="stylesheet" href="asset/css/alljobs.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>All Jobs</h1>
            <p>Page 1 of 120 job offers</p>
        </header>

        <div class="main-content">
            <aside class="filters">
                <h2>Filters</h2>
                <div class="filter-group">
                    <label for="sort-by">Sort By</label>
                    <select id="sort-by">
                        <option value="salary">Salary</option>
                        <option value="date-posted">Date Posted</option>
                    </select>
                </div>
                <div class="filter-group">
                    <h3>Job Type</h3>
                    <label><input type="checkbox"> Full-time</label><br>
                    <label><input type="checkbox"> Part-time</label><br>
                    <label><input type="checkbox"> Internship</label>
                </div>
                <div class="filter-group">
                    <h3>Preferred Location</h3>
                    <label><input type="checkbox"> Remote</label><br>
                    <label><input type="checkbox"> Office</label><br>
                    <label><input type="checkbox"> Hybrid</label>
                </div>
                <div class="filter-group">
                    <label for="company">Company</label>
                    <input type="text" id="company" placeholder="Type Company Name here...">
                </div>
                <div class="filter-group">
                    <label for="salary-range">Salary per year</label>
                    <input type="range" id="salary-range" min="100000" max="1500000">
                </div>
            </aside>

            <section class="job-listings">
                <div class="job-card">
                    <div class="job-header">
                        <h3>UX Designer for Product Based Company</h3>
                        <p>Banglore, India | Remote not available</p>
                    </div>
                    <div class="job-details">
                        <span class="job-type full-time">Full-time</span>
                        <span class="job-salary">₹15,00,000 a year</span>
                        <span class="job-experience">2-3 years experience</span>
                    </div>
                    <div class="job-tags">
                        <span class="urgent">Urgent Recruiting</span>
                        <span class="label">Apply Now</span>
                    </div>
                </div>

                <!-- Repeat similar blocks for other job listings -->
            </section>
        </div>

        <footer class="pagination">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
        </footer>
    </div>
</body>

</html>