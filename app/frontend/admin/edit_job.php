<?php
require '../../backend/Config/DbContext.php';

use Config\DbContext;

$dbContext = new DbContext();

$jobOffer = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['title'], $_POST['description'], $_POST['categoryId'], $_POST['companyId'])) {
        $id = $_POST['id'];
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
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
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
    <!-- Head Content -->
</head>
<body>

<div class="board">
    <!-- Sidebar and Main Content -->
</div>

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

</body>
</html>
