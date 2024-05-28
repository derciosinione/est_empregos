<?php
require '../../backend/Config/DbContext.php';

use Config\DbContext;

// Create a new instance of the DbContext class
$dbContext = new DbContext();

// Initialize error message
$errorMessage = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $categoryId = $_POST['category_id'];
    $companyId = $_POST['company_id']; // Assuming you have a way to get the company ID

    // Prepare the SQL statement to insert a new job offer
    $sql = "INSERT INTO JobOffers (Title, Description, CategoryId, CompanyId, LastEditionManagerId, IsActive, IsDeleted) 
            VALUES ('$title', '$description', '$categoryId', '$companyId', '1', true, false)";

    // Execute the query
    $queryResult = $dbContext->executeSqlQuery($sql);

// Check if the query was successful
if ($queryResult) {
    header("Location: jobs.php");
    exit;
} else {
    // Handle the case where the query failed
    echo "Failed to add job offer.";
}
}

// Fetch categories from the database
$categories = $dbContext->executeSqlQuery("SELECT Id, Name FROM Categories WHERE IsActive = true");

// Fetch active companies from the database
$companies = $dbContext->executeSqlQuery("SELECT Id, Name FROM Companies WHERE IsActive = true");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/add-jobs.css">
    <title>Add New Job Offer</title>
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
                        <a href="../website/index.php">
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
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
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
                <div class="container">
                    <div class="title">Adicionar Nova Oferta de Emprego</div>
                    <!-- Display error message if there was an error -->
                    <?php if (!empty($errorMessage)) : ?>
                        <div class="error-message"><?php echo $errorMessage; ?></div>
                    <?php endif; ?>
                    <!-- Job offer form -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                          class="job-offer-form">
                        <div class="form-group">
                            <label for="title">Título:</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            <textarea id="description" name="description" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Categoria:</label>
                            <select id="category_id" name="category_id" required>
                                <option value="">Selecione uma categoria</option>
                                <!-- Populate dropdown menu with categories -->
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?php echo $category['Id']; ?>"><?php echo $category['Name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="company_id">Empresa:</label>
                            <select id="company_id" name="company_id" required>
                                <option value="">Selecione uma empresa</option>
                                <!-- Populate dropdown menu with companies -->
                                <?php foreach ($companies as $company) : ?>
                                    <option value="<?php echo $company['Id']; ?>"><?php echo $company['Name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar Oferta</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
