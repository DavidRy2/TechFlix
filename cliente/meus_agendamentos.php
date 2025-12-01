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

        .container-content {
            position: relative;
            z-index: 2;
            padding-top: 80px;
        }

        .card-agendamento {
            background: #1d1f27dd;
            border: 1px solid #3a414d;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 15px;
            color: white;
        }

        .titulo {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm position-relative" style="z-index:3;">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">Wayne Tech</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="home_cliente.php" class="nav-link">Início</a></li>
                    <li class="nav-item"><a href="../servicos.php" class="nav-link">Serviços</a></li>
                    <li class="nav-item"><a href="meus_agendamentos.php" class="nav-link active">Meus Agendamentos</a></li>
                    <li class="nav-item"><a href="../logout.php" class="nav-link text-danger fw-bold">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container container-content">
        <h2 class="titulo">Meus Agendamentos</h2>

        <?php if (isset($_GET['status']) && $_GET['status'] === "ok") : ?>
            <div id="alertaSucesso" class="alert alert-success text-center fw-semibold">
                Agendamento realizado com sucesso!
            </div>

            <script>
                setTimeout(function () {
                    let alerta = document.getElementById("alertaSucesso");
                    if (alerta) {
                        alerta.style.opacity = "0";
                        setTimeout(() => alerta.remove(), 500);
                    }
                }, 3000);
            </script>
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
                    <p><strong>Data:</strong> <?= $ag['data'] ?></p>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</body>
</html>
