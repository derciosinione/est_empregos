<?php
require '../../backend/Config/DbContext.php';

use Config\DbContext;

$dbContext = new DbContext();

$jobOffer = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['categoryId']) && isset($_POST['companyId'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $categoryId = $_POST['categoryId'];
        $companyId = $_POST['companyId'];

        $sql = "UPDATE JobOffers SET Title=?, Description=?, CategoryId=?, CompanyId=? WHERE Id=?";
        $stmt = $dbContext->getConnection()->prepare($sql);
        $stmt->bind_param('ssiii', $title, $description, $categoryId, $companyId, $id);

        if ($stmt->execute()) {
            header("Location: jobs.php");
            exit();
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        echo "Missing required fields.";
    }
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Verificar se o registro existe antes de recuperar os dados
    $result = $dbContext->executeSqlQuery("SELECT * FROM JobOffers WHERE Id=$id");
    if ($result && count($result) > 0) {
        $jobOffer = $result[0];
    } else {
        echo "Registro não encontrado.";
        exit();
    }
} else {
    echo "Requisição inválida.";
    exit();
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
    <link rel="stylesheet" href="css/edit_job.css">
    <title>Editar Oferta de Emprego</title>
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
        <div class="main-body">
            <h2>Editar Oferta de Emprego</h2>
            <form method="post" action="edit_job.php">
                <input type="hidden" name="id" value="<?php echo isset($jobOffer['Id']) ? $jobOffer['Id'] : ''; ?>">
                <label for="title">Título:</label>
                <input type="text" name="title" value="<?php echo isset($jobOffer['Title']) ? $jobOffer['Title'] : ''; ?>" required>
                <br>
                <label for="description">Descrição:</label>
                <textarea name="description" required><?php echo isset($jobOffer['Description']) ? $jobOffer['Description'] : ''; ?></textarea>
                <br>
                <label for="categoryId">Categoria:</label>
                <input type="text" name="categoryId" value="<?php echo isset($jobOffer['CategoryId']) ? $jobOffer['CategoryId'] : ''; ?>" required>
                <br>
                <label for="companyId">Empresa:</label>
                <input type="text" name="companyId" value="<?php echo isset($jobOffer['CompanyId']) ? $jobOffer['CompanyId'] : ''; ?>" required>
                <br>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </main>
</div>
</body>
</html>
