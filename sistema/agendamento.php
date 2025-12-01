<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $arquivo = "../dados/agendamentos.json";

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';

    if ($nome === '' || $email === '' || $mensagem === '') {
        echo "<script>alert('Preencha todos os campos!'); window.location.href='agendamento.php';</script>";
        exit;
    }

    $dados = json_decode(file_get_contents($arquivo), true);

    $novoAgendamento = [
        "nome" => $nome,
        "email" => $email,
        "mensagem" => $mensagem,
        "data" => date("d/m/Y H:i")
    ];

    $dados[] = $novoAgendamento;

    file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    header("Location: ../cliente/meus_agendamentos.php?status=ok");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Atendimento - WayneTech</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        
        body {
            margin: 0;
            background: 
                linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)),
                url('../assets/img/fundo.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #dcdcdc;
            font-family: "Segoe UI", sans-serif;
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(10, 10, 14, 0.85) !important;
            border-bottom: 1px solid #2a2a2f;
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #0dcaf0 !important;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #0dcaf0 !important;
        }

        .card-agendar {
            max-width: 450px;
            background: rgba(20, 20, 25, 0.92);
            border: 1px solid #23232b;
            border-radius: 18px;
            padding: 25px;
            margin: 90px auto;  
            box-shadow: 0 0 25px rgba(13, 202, 240, 0.15);
            backdrop-filter: blur(5px);
            transition: 0.3s;
}


        .card-agendar:hover {
            border-color: #0dcaf0;
            box-shadow: 0 0 35px rgba(13, 202, 240, 0.25);
        }

        .card-header-custom {
            text-align: center;
            margin-bottom: 18px;
        }

        .logo {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 3px solid #0dcaf0;
            padding: 5px;
            object-fit: cover;
            box-shadow: 0 0 20px rgba(13, 202, 240, 0.4);
        }

        .form-control {
            background: #1a1a21;
            border: 1px solid #2d2d36;
            color: white;
            border-radius: 10px;
        }

        .form-control:focus {
            border-color: #0dcaf0;
            box-shadow: 0 0 10px rgba(13, 202, 240, 0.4);
        }

        .btn-wayne {
            background: #0dcaf0;
            color: #0d0d12;
            border: none;
            font-weight: 600;
            padding: 12px;
            border-radius: 12px;
            width: 100%;
            transition: 0.25s;
        }

        .btn-wayne:hover {
            background: #aef7ff;
            color: #000;
        }

        footer {
            margin-top: 70px;
            padding: 35px 0;
            text-align: center;
            background: rgba(12, 12, 16, 0.85);
            border-top: 1px solid #2d2d32;
            backdrop-filter: blur(8px);
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="../cliente/home_cliente.php">Wayne Tech</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="../cliente/home_cliente.php">Início</a></li>

                <li class="nav-item"><a class="nav-link" href="../servicos.php">Serviços</a></li>

                <li class="nav-item"><a class="nav-link active" href="agendamento.php">Agendamento</a></li>

                <li class="nav-item"><a class="nav-link" href="../cliente/meus_agendamentos.php">Meus Agendamentos</a></li>

                <li class="nav-item d-flex align-items-center ms-3">
                    <span class="text-info fw-semibold">👋 <?= $_SESSION['usuario']['nome'] ?></span>
                </li>

                <li class="nav-item ms-2">
                    <a class="btn btn-danger btn-sm" href="../sistema/logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="card-agendar">
    <div class="card-header-custom">
        <img src="../assets/img/LOGO3.jpeg" class="logo" alt="WayneTech">
    </div>

    <h3 class="text-center mb-4">Agendar Atendimento</h3>

    <form method="POST" action="agendamento.php">
        <div class="mb-3">
            <input type="text" name="nome" class="form-control" placeholder="Seu nome" required>
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Seu e-mail" required>
        </div>

        <div class="mb-3">
            <textarea name="mensagem" rows="4" class="form-control" placeholder="Descreva o problema..." required></textarea>
        </div>

        <button class="btn-wayne" type="submit">Enviar Agendamento</button>
    </form>
</div>

<footer>
    <p class="mb-1">© 2025 Wayne Tech — Todos os direitos reservados</p>
    <a href="#" class="text-secondary text-decoration-none">Voltar ao topo</a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
