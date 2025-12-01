<?php
session_start();

// Protege a página — só acessa se estiver logado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.html");
    exit;
}

$nome = $_SESSION['usuario']['nome'];
$email = $_SESSION['usuario']['email'];
?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços - WayneTech</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0d0d12;
            color: #dcdcdc;
            font-family: "Segoe UI", sans-serif;
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(10, 10, 14, 0.85) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #2a2a2f;
        }

        .navbar-brand {
            font-size: 1.6rem;
            letter-spacing: 1px;
            color: aqua !important;
        }

        .nav-link:hover {
            color: #0dcaf0 !important;
        }

        .banner-servicos {
            height: 320px;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .card-servico {
            border-radius: 15px;
            background: #141418;
            border: 1px solid #23232b;
            padding-bottom: 10px;
            transition: 0.35s ease;
        }

        .card-servico:hover {
            border-color: #0dcaf0;
            transform: translateY(-5px);
            box-shadow: 0 0 25px rgba(13, 202, 240, 0.15);
        }

        .card-servico img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            object-position: center;
            border-radius: 12px 12px 0 0;
            border-bottom: 1px solid #202028;
        }

        .card-title {
            color: aqua;
            font-weight: 600;
        }

        footer {
            margin-top: 120px;
            padding: 45px 0;
            background: #0c0c10;
            border-top: 1px solid #2d2d32;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Wayne Tech</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto me-3">

                <li class="nav-item">
                    <span class="nav-link disabled text-info fw-bold">
                        👋 Olá, <?= htmlspecialchars($nome) ?>
                    </span>
                </li>

                <!-- CORRIGIDO -->
                <li class="nav-item"><a href="home_cliente.php" class="nav-link">Início</a></li>

                <li class="nav-item">
                    <a href="servicos.php" class="nav-link active" style="color: #0dcaf0;">Serviços</a>
                </li>

                <!-- CORRIGIDO -->
                <li class="nav-item"><a href="../sistema/agendamento.php" class="nav-link">Agendamento</a></li>

                <!-- CORRIGIDO -->
                <li class="nav-item"><a class="nav-link text-danger fw-bold" href="../sistema/logout.php">Sair</a></li>

            </ul>

            <form class="d-flex" role="search">
                <input class="form-control me-2"
                    type="search"
                    placeholder="Buscar serviço..."
                    aria-label="Search"
                    style="background:#1b1b22; border:1px solid #2b2b32; color:#fff;">
                <button class="btn btn-outline-info" type="submit">Buscar</button>
            </form>

        </div>
    </div>
</nav>

<!-- BANNER -->
<div class="banner-servicos" style="margin-top: 80px;">
    <div>
        <h1 class="fw-bold display-4 text-white">Serviços Técnicos</h1>
        <p class="text-light fs-5">Assistência especializada e soluções rápidas para seus dispositivos.</p>
    </div>
</div>

<!-- LISTA DE SERVIÇOS -->
<div class="container my-5">
    <div class="row g-4">

        <?php 
        $servicos = [
            ["Troca de Tela", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwS34nk5fdGvkLhskmZ0lWvesivS0g3t9oHw&s"],
            ["Formatação Completa", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_ie8dwMHDSenl64U4zp4vqobWeWPzlxnLVQ&s"],
            ["Troca de Bateria", "https://blog.fixonline.com.br/wp-content/uploads/2023/04/kilian-seiler-PZLgTUAhxMM-unsplash-scaled.jpg"],
            ["Limpeza Interna", "https://us.123rf.com/450wm/sinenkiy/sinenkiy2301/sinenkiy230100982/196573644-fotos-em-close-up-mostrando-o-processo-de-reparo-do-telefone-celular.jpg"],
            ["Troca de Teclado", "https://1001solucoes.com.br/wp-content/uploads/2021/06/troca-de-teclado-notebook.jpg"],
            ["Recuperação de Sistema", "https://i0.wp.com/indicca.com.br/wp-content/uploads/2020/11/Restauracao_do_sistema_e_formatacao_sao_a_mesma_coisa_Indicca.jpg"],
            ["Upgrade de Hardware", "https://iphonemax.com.br/wp-content/uploads/2023/10/tela-de-iphone.jpg"],
            ["Reparo de Placa-Mãe", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK2JUQ1uQIQl51JLZ7nM-nNaRhPeub6dNoQA&s"]
        ];

        foreach ($servicos as $s):
        ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card-servico h-100">
                <img src="<?= $s[1] ?>">
                <div class="p-3">
                    <h5 class="card-title"><?= $s[0] ?></h5>
                    <p class="text-muted">Clique abaixo para agendar este serviço.</p>

                    <a href="../sistema/agendamento.php" class="btn btn-primary w-100">Agendar Serviço</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<footer class="text-center">
    <p class="mb-1">© 2025 Wayne Tech — Todos os direitos reservados</p>
    <a href="#" class="text-secondary text-decoration-none">Voltar ao topo</a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
