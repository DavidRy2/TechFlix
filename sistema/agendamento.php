<?php 
session_start();

// PROCESSAMENTO DO FORMULÁRIO — executa quando o método for POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $arquivo = "../dados/agendamentos.json";

    // Se o arquivo não existir, cria um vazio
    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    // Coleta dados
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';

    // Validação básica
    if ($nome === '' || $email === '' || $mensagem === '') {
        echo "<script>alert('Preencha todos os campos!'); window.location.href='agendamento.php';</script>";
        exit;
    }

    // Carregar dados existentes
    $dados = json_decode(file_get_contents($arquivo), true);

    // Criar novo registro
    $novoAgendamento = [
        "nome" => $nome,
        "email" => $email,
        "mensagem" => $mensagem,
        "data" => date("d/m/Y H:i")
    ];

    $dados[] = $novoAgendamento;

    // Salvar
    file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // REDIRECIONA PARA “Meus agendamentos”
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
            background: url('../assets/img/fundo.jpg') no-repeat center/cover;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
            backdrop-filter: blur(2px);
        }

        .card-agendar {
            width: 100%;
            max-width: 420px;
            background: #2b313cd0;
            border-radius: 18px;
            border: 1px solid #3a414d;
            padding-bottom: 20px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.6);
            position: relative;
            z-index: 2;
            margin: 80px auto;
        }

        .card-header {
            background: #0a3a78;
            border-radius: 18px 18px 0 0;
            padding: 25px 10px;
            text-align: center;
        }

        .logo {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            object-fit: cover;
            background: #fff2;
            padding: 5px;
        }

        .form-control {
            background: #1f242dcc;
            border: 1px solid #3a414d;
            color: white;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #0a3a78;
            box-shadow: 0 0 5px #0a3a78;
        }

        .btn-wayne {
            background: #0a3a78 !important;
            color: #fff !important;
            border: none !important;
            border-radius: 10px !important;
            padding: 12px 0 !important;
            font-size: 1rem !important;
            font-weight: 500 !important;
            width: 100% !important;
        }

        .btn-wayne:hover {
            background: #072c5a !important;
        }

        footer {
            padding: 25px 0;
            background: #111518;
            border-top: 1px solid #222831;
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm position-relative" style="z-index: 3;">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 text-info" href="../cliente/home_cliente.php">Wayne Tech</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a href="../cliente/home_cliente.php" class="nav-link">Início</a></li>

                    <li class="nav-item"><a href="../servicos.php" class="nav-link">Serviços</a></li>

                    <li class="nav-item"><a href="agendamento.php" class="nav-link active">Agendamento</a></li>

                    <li class="nav-item"><a href="../cliente/meus_agendamentos.php" class="nav-link">Meus Agendamentos</a></li>

                    <!-- Nome do usuário -->
                    <li class="nav-item d-flex align-items-center ms-3">
                        <span class="text-info fw-semibold">👋 <?= $_SESSION['usuario']['nome'] ?></span>
                    </li>

                    <li class="nav-item ms-2">
                        <a href="../sistema/logout.php" class="btn btn-danger btn-sm">Sair</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <div class="card card-agendar">
        <div class="card-header">
            <img src="../assets/img/LOGO3.jpeg" class="logo" alt="WayneTech">
        </div>

        <div class="card-body text-center">
            <h3 class="mb-4">Agendar Atendimento</h3>

            <form method="POST" action="agendamento.php">
                <div class="mb-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                </div>

                <div class="mb-3">
                    <textarea name="mensagem" class="form-control" rows="4" placeholder="Quero consertar meu iPhone..." required></textarea>
                </div>

                <button type="submit" class="btn btn-wayne">Agendar</button>
            </form>
        </div>
    </div>

    <footer class="text-center text-light">
        <p>© 2025 Wayne Tech — Todos os direitos reservados</p>
        <a href="#" class="text-primary text-decoration-none">Voltar ao topo</a>
    </footer>

</body>
</html>
