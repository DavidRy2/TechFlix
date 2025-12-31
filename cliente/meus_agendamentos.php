<?php
session_start();

// Impede acesso sem login
if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('Você precisa estar logado.'); window.location.href='../login.html';</script>";
    exit;
}

// E-mail do cliente logado
$usuarioEmail = $_SESSION['usuario']['email'];

// Caminho do JSON
$arquivo = "../dados/agendamentos.json";

$dados = [];
if (file_exists($arquivo)) {
    $dados = json_decode(file_get_contents($arquivo), true);
}

$meusAgendamentos = array_filter($dados, function ($item) use ($usuarioEmail) {
    return strtolower($item['email']) === strtolower($usuarioEmail);
});
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <title>Meus Agendamentos - WayneTech</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0d0d12;
            color: #dcdcdc;
            font-family: "Segoe UI", sans-serif;
            min-height: 100vh;
        }

        .navbar {
            background: rgba(10, 10, 14, 0.85) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #2a2a2f;
        }

        .navbar-brand {
            font-size: 1.6rem;
            letter-spacing: 1px;
            color: #0dcaf0 !important;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #0dcaf0 !important;
        }

        .container-content {
            padding-top: 120px;
            padding-bottom: 80px;
        }

        .titulo {
            text-align: center;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .card-agendamento {
            background: #141418;
            border-radius: 15px;
            padding: 24px;
            border: 1px solid #23232b;
            transition: .3s;
            margin-bottom: 18px;
        }

        .card-agendamento:hover {
            border-color: #0dcaf0;
            transform: translateY(-6px);
            box-shadow: 0 0 25px rgba(13, 202, 240, 0.12);
        }

        footer {
            padding: 35px 0;
            background: #0c0c10;
            border-top: 1px solid #2d2d32;
            text-align: center;
            color: #aaa;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="home_cliente.php">Wayne Tech</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="home_cliente.php">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="../servicos.php">Serviços</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Meus Agendamentos</a></li>
            </ul>

            <span class="text-info ms-3 fw-bold">
                👋 <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>
            </span>

            <a class="btn btn-danger btn-sm ms-3" href="../sistema/logout.php">Sair</a>
        </div>
    </div>
</nav>

<div class="container container-content">

    <h2 class="titulo">Meus Agendamentos</h2>

    <?php if (isset($_GET['status']) && $_GET['status'] === "ok") : ?>
        <div class="alert alert-success text-center fw-semibold">
            Agendamento realizado com sucesso!
        </div>
    <?php endif; ?>

    <?php if (empty($meusAgendamentos)) : ?>

        <div class="alert alert-warning text-center">
            Você ainda não possui agendamentos.
        </div>

    <?php else : ?>

        <?php foreach ($meusAgendamentos as $ag) : ?>
            <div class="card-agendamento">
                <p><strong>Nome:</strong> <?= htmlspecialchars($ag['nome']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($ag['email']) ?></p>
                <p><strong>Mensagem:</strong> <?= htmlspecialchars($ag['mensagem']) ?></p>
                <p><strong>Data:</strong> <?= htmlspecialchars($ag['data']) ?></p>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>

</div>

<footer>
    © 2025 Wayne Tech — Todos os direitos reservados
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

