<?php

require '../../backend/Config/DbContext.php';

use Config\DbContext;

$dbContext = new DbContext();

// Fetch job offers from the database with company name
$jobs = $dbContext->executeSqlQuery("
    SELECT 
        j.*, 
        c.Name AS CompanyName 
    FROM 
        JobOffers j 
    JOIN 
        Companies c ON j.CompanyId = c.Id
");

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
  <title>Document</title>
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
        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="index.php">
              <i class="fas fa-chart-line"></i>
              <span>Dashboard</span>
            </a>
          </li>
        </ul>

        <ul class="active-sidebar-menu">
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="jobs.php">
              <i class="fas fa-briefcase"></i>
              <span>Ofertas</span>
            </a>
          </li>
        </ul>

        <br>
        <hr>
        <br>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="admin.php">
              <i class="fas fa-user-shield"></i>
              <span>Admin</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="companies.php">
              <i class="fas fa-building"></i>
              <span>Empresas</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="team.php">
              <i class="fas fa-users"></i>
              <span>Team</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="managers.php">
              <i class="fas fa-user-friends"></i>
              <span>Gestores</span>
            </a>
          </li>
        </ul>

        <br>
        <hr>
        <br>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li><a href="settings.php">
              <i class="fas fa-cogs"></i>
              <span>Settings</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="../website/index.html">
              <i class="fas fa-sign-out-alt"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
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

            <div class="main-header-right">
                <div class="avatar">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
                <div>
                    <p class="bold">Ana Bela</p>
                    <p class="blackOpacity">Admin</p>
                </div>
            </div>
        </div>

        <!-- MAIN BODY -->
        <!-- MAIN BODY -->
  	    <div class="main-body">
        <!-- Add button to navigate to add-job.php -->
        <div class="add-job-btn">
          <a href="add-jobs.php" class="btn btn-primary">Adicionar Nova Oferta</a>
        </div>
        <?php foreach ($jobs as $job) : ?>
        <div class="tarjeta">
            <h3><?php echo $job['Title']; ?></h3>
            <p><strong>Empresa:</strong> <?php echo $job['CompanyName']; ?></p>
            <p>Data de publicação: <?php echo $job['CreatedAt']; ?></p>
            <p>Estado: <?php echo $job['IsActive']; ?></p>
            <!-- Link to view job details -->
            <p><a href="job-details.php?id=<?php echo $job['Id']; ?>">Ver Detalhes</a></p>
            <!-- Link para editar o trabalho -->
            <p><a href="edit_job.php?id=<?php echo $job['Id']; ?>"><i class="fas fa-edit"></i> Editar</a></p>

        <!-- Link para excluir o trabalho -->
           <p><a href="delete_job.php?id=<?php echo $job['Id']; ?>" class="delete-job"><i class="fas fa-trash-alt"></i> Excluir</a></p>

        </div>
        <?php endforeach; ?>
        </div>
    </main>
  </div>
</body>
</html>
