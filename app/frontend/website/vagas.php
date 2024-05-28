<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/course.css">

    <title>Est Empregos > Vagas</title>
</head>
<body>

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">ESTEmpregos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="vagas.html">Vagas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactos.php">Contactos</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a class="btn btn-primary" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <div class="hero">
        <div class="search-container">
            <h1>Vagas</h1>
            <h5>Vem aprender connosco</h5>
            <p>Pesquisa a vaga desejada, ela está a um clique de ti</p>
            <form>
                <input class="form-control" type="search" placeholder="Pesquisar..." aria-label="Search">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</header>

<!-- Main Content -->
<main>
    <section class="our-courses mt-15">
        <h2>
            Confira as nossas vagas
        </h2>

        <div class="course-cards">

            <div class="transition-scale">
                <a href="vagas-detalhes.php">
                    <div class="course-img">
                        <img src="Img/courses-1.jpg" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Desenvolvedor Frontend Senior</h6>
                        <span class="bg-yellow">T.I</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="vagas-detalhes.php">
                    <div class="course-img">
                        <img src="Img/courses-4.jpg" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Analista Financeiro</h6>
                        <span class="bg-yellow">Finanças</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="vagas-detalhes.php">
                    <div class="course-img">
                        <img src="Img/courses-3.jpg" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Big Data</h6>
                        <span class="bg-blue">Ciência de Dados</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="vagas-detalhes.php">
                    <div class="course-img">
                        <img src="Img/courses-2.jpg" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Enfermeira Vetérinária</h6>
                        <span class="bg-dark-blue">Medicina</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="vagas-detalhes.php">
                    <div class="course-img">
                        <img src="Img/courses-1.jpg" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Desenvolvedor Frontend Senior</h6>
                        <span class="bg-yellow">T.I</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="vagas-detalhes.php">
                    <div class="course-img">
                        <img src="Img/courses-4.jpg" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Analista Financeiro</h6>
                        <span class="bg-yellow">T.I</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="vagas-detalhes.php">
                    <div class="course-img">
                        <img src="Img/courses-3.jpg" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Big Data</h6>
                        <span class="bg-blue">Ciência de Dados</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="vagas-detalhes.php">
                    <div class="course-img">
                        <img src="Img/courses-2.jpg" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Enfermeira Vetérinária</h6>
                        <span class="bg-dark-blue">Medicina</span>
                    </div>
                </a>
            </div>

        </div>

        <div class="mt-15">
            <ul class="pagination m-lg-3">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">2</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>

    </section>
</main>

<!-- Footer Content -->
<footer class="bg-dark text-white">
    <section>
        <div class="company-description">
            <h5 class="text-uppercase mb-4 font-weight-bold">Est Empregos</h5>
            <p>Bem-vindo à Est Empregos, sua plataforma de vagas online!

Nosso objetivo é conectar você às melhores oportunidades de emprego, proporcionando um caminho direto para o sucesso profissional. Explore uma variedade de vagas em diversas áreas e encontre a oportunidade ideal para sua carreira. Com o suporte de especialistas dedicados, estamos aqui para ajudar você a se destacar no mercado de trabalho.

Junte-se a nós e comece sua jornada rumo ao emprego dos seus sonhos hoje mesmo!</p>
        </div>

        <div>
            <h5 class="text-uppercase">Contato</h5>
            <p><i class="fa fa-map-marker-alt mr-2"></i> Rua Doutor Sinione Derone Dias, 22 1E</p>
            <p><i class="fa fa-phone-alt mr-2"></i> +351 923 342 982</p>
            <p><i class="far fa-envelope"></i> info@myacademy.com</p>
        </div>

        <div>
            <h5 class="text-uppercase">Links Uteis</h5>
            <ul>
                <li><a href="autores.html"><i class="fas fa-chevron-right"></i> Autores</a></li>
                <li><a href="vagas.html"><i class="fas fa-chevron-right"></i> Vagas</a></li>
                <li><a href="contactos.php"><i class="fas fa-chevron-right"></i> Contacto</a></li>
                <li><a href="criar-conta.php"><i class="fas fa-chevron-right"></i> Criar Conta</a></li>
            </ul>
        </div>
    </section>

    <hr class="mb-4">

    <div class="copy-right">
        <div>
            <p>© 2024 All rights reserved by:<a href="#"><strong class="text-white"> ESTEmpregos</strong></a></p>
        </div>

        <div>
            <ul>
                <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li>
                <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/in/derciosimione" target="_blank"><i
                        class="fab fa-linkedin-in"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCquw3zsKMJH0IvS6zqyQJZw" target="_blank"><i
                        class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>