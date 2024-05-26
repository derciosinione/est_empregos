<?php
require '../../backend/Config/DbContext.php';

use Config\DbContext;


$dbContext = new DbContext();


$jobOffers = $dbContext->executeSqlQuery("SELECT Id, Title, Description, CategoryId, CompanyId FROM JobOffers");

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
            <div class="container">
                <div class="title">Ofertas de Emprego</div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Empresa</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($jobOffers): ?>
                            <?php foreach ($jobOffers as $job): ?>
                                <tr>
                                    <td><?php echo $job['Id']; ?></td>
                                    <td><?php echo $job['Title']; ?></td>
                                    <td><?php echo $job['Description']; ?></td>
                                    <td><?php echo $job['CategoryId']; ?></td>
                                    <td><?php echo $job['CompanyId']; ?></td>
                                    <td>
                                        <form method="post" action="edit_job.php">
                                            <input type="hidden" name="id" value="<?php echo $job['Id']; ?>">
                                            <button type="submit" class="btn btn-edit">Editar</button>
                                        </form>

                                        <form method="post" action="delete_job.php" onsubmit="return confirm('Tem certeza que deseja excluir esta oferta?');">
                                            <input type="hidden" name="id" value="<?php echo $job['Id']; ?>">
                                            <button type="submit" class="btn btn-delete">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">Nenhuma oferta encontrada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body>
</html>
