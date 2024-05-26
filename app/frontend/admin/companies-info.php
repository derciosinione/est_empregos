<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/empresas.css">
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

        <ul>
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

        <ul class="active-sidebar-menu">
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
            <img
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              alt="">
          </div>
          <div>
            <p class="bold">Ana Bela</p>
            <p class="blackOpacity">Admin</p>
          </div>
        </div>
      </div>

      <!-- MAIN BODY -->
      <div class="main-body">
        <div class="empresas-display">
          <?php
            echo "<a href='companies.php' class='return-button'>Voltar</a>";
            // Retrieve the company ID from the URL parameter
            $companyId = $_GET['id'];

            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "est_jobs";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch details of the company with the given ID
            $sql = "SELECT * FROM Companies WHERE id = $companyId";
            $sql = "SELECT Companies.*, Users.Email AS UserEmail FROM Companies 
        INNER JOIN Users ON Companies.userId = Users.id 
        WHERE Companies.id = $companyId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    // Display company details here
                    echo "<img src='../Images/empresa1.png' class='company-icon'>" . $row['Name'] . "<br>";
                    echo "<div class='status' data-status='" . $row['CompanyStatusId'] . "'></div><br>";
                    echo "<br>";
                    echo "Address: " . $row['Address'] . "<br>";
                    echo "NIF: " . $row['Nif'] . "<br>";
                    echo "Email: " . $row['UserEmail'] . "<br>";
                    echo "Data de Criação: " . $row['CreatedAt'] . "<br>";
                    echo "ID: " . $row['Id'];


                    echo "<form action='components/update-company-status.php' method='POST'>";
                    echo "<input type='hidden' name='companyId' value='" . $row['Id'] . "'>";
                    echo "<select name='newStatus'>";

                    // Status options
                    $statusOptions = array(
                        1 => 'Active',
                        2 => 'Inactive',
                        3 => 'Pending'
                    );

                    // Loop through status options
                    foreach ($statusOptions as $statusId => $statusName) {
                        // Check if the current status is not the same as the option being added
                        if ($statusId != $row['CompanyStatusId']) {
                            // Add option to dropdown
                            echo "<option value='$statusId'>$statusName</option>";
                        }
                    }

                    echo "</select>";
                    echo "  ";
                    echo "<button type='submit'>Mudar Estado</button>";
                    echo "</form>";
                }
            } else {
                echo "No company found with the given ID.";
            }

            $conn->close();
            ?>
        </div>

      </div>

    </main>
  </div>
</body>

</html>