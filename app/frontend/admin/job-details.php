<?php
require '../../backend/Config/DbContext.php';

use Config\DbContext;

$dbContext = new DbContext();

// Check if job ID is provided in the URL
if (isset($_GET['id'])) {
    $jobId = $_GET['id'];

    // Fetch job details based on the provided job ID
    $jobDetails = $dbContext->executeSqlQuery("
        SELECT 
            j.*, 
            c.Name AS CompanyName 
        FROM 
            JobOffers j 
        JOIN 
            Companies c ON j.CompanyId = c.Id
        WHERE 
            j.Id = $jobId
    ");

    // Check if job details are found
    if ($jobDetails) {
        $job = $jobDetails[0]; // Assuming only one job is found for the given ID
    } else {
        // Redirect to jobs.php if job details are not found
        header("Location: jobs.php");
        exit;
    }
} else {
    // Redirect to jobs.php if job ID is not provided in the URL
    header("Location: jobs.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/jobs.css">
    <title>Detalhes da Vaga</title>
</head>

<body>

<div class="board">
    <!-- SIDE BAR -->
    <aside>
        <!-- SIDE BAR HEADER -->
        <div class="sidebar-header">
            <span>EST<span>Empregos</span></span>
        </div>

        <!-- SIDE BAR MENU -->
        <div class="sidebar-menu">
            <!-- Sidebar Content -->
        </div>
    </aside>

    <!-- MAIN ELEMENT  -->
    <main>
        <!-- MAIN HEADER -->
        <div class="main-header">
            <div class="main-header-left">
                <div>
                    <i class="fas fa-bars menu-icon"></i>
                </div>
                <div class="search-container">
                    <input type="text" placeholder="Search...">
                    <button type="submit" class="btn-icon"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>

        <!-- MAIN BODY -->
        <div class="main-body">
            <div class="container">
                <div class="title">Detalhes da vaga <?php echo $job['Title']; ?></div>
                <div class="user-details">
                    <div class="input-box">
                        <p><b>Descrição: </b><?php echo $job['Description']; ?></p>
                    </div>
                    <div class="input-box">
                        <p><b>Empresa: </b><?php echo $job['CompanyName']; ?></p>
                    </div>
                    <!-- Add more job details here -->
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>
