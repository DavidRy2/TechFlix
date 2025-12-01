<?php
require __DIR__ . '/proteger_admin.php';
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wayne Tech - Agendamentos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            padding-top: 70px;
            background-color: #121212;
            color: #f1f1f1;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            background-color: #1e1e1e;
            padding-top: 70px;
            border-right: 1px solid #333;
        }
        .sidebar a {
            display: block;
            color: #f1f1f1;
            padding: 15px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #333;
            border-radius: 8px;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }

        footer {
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #333;
            margin-top: 50px;
            color: #888;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Wayne Tech Admin</a>

        <div class="d-flex align-items-center">
            <span class="text-info me-3 fw-bold">
                👋 <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>
            </span>

            <a class="btn btn-danger btn-sm" href="../sistema/logout.php">Sair</a>
        </div>
    </div>
</nav>

<!-- SIDEBAR -->
<div class="sidebar">
    <a href="home_adm.php"><i class="bi bi-house-door-fill me-2"></i>Início</a>
    <a href="agendamentos_adm.php" class="active"><i class="bi bi-calendar2-event-fill me-2"></i>Agendamentos</a>
    <a href="#"><i class="bi bi-gear-fill me-2"></i>Serviços</a>
    <a href="#"><i class="bi bi-people-fill me-2"></i>Clientes</a>
</div>

<!-- CONTENT -->
<div class="content">

    <h2 class="mb-4 fw-bold">Todos os Agendamentos</h2>

    <div class="table-responsive">
        <table class="table table-dark table-hover align-middle">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Descrição</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody id="lista-agendamentos">
                <!-- Preenchido pelo JS -->
            </tbody>
        </table>
    </div>

</div>

<footer>
    © 2025 Wayne Tech — Todos os direitos reservados
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/script_dados_clientes.js"></script>

</body>
</html>
