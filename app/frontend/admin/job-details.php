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
      </div>

      <!-- MAIN BODY -->
      <div class="main-body">
        <div class="container">
          <div class="title">Detalhes da vaga X</div>
          <form action="#">
            <div class="user-details">
              <div class="input-box">
                <p><b>Descrição: </b>Estamos a procura de um Desenvolvedor Web altamente talentoso para se juntar à
                  nossa equipe de TI. Serás responsável pelo desenvolvimento e manutenção de sites e aplicativos da Web.
                </p>
              </div>
              <div class="input-box">
                <p><b>Localização: </b>Coimbra-Portugal</p>
              </div>
              <div class="input-box">
                <p><b>Requisitos: </b></p>
                <ul>
                  <li>
                    Experiência comprovada como Desenvolvedor Web ou em uma posição semelhante.
                  </li>
                  <li>
                    Muito bons conhecimentos de linguagens de programação Web, como HTML, CSS, JavaScript e frameworks
                    como React ou Angular.
                  </li>
                </ul>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
