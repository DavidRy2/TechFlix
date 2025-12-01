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

        /* ======== BASE ======== */
        body {
            padding-top: 70px;
            background: #0b0c10;
            color: #e5e5e5;
            font-family: "Segoe UI", sans-serif;
            margin: 0;
        }

        /* ======== NAVBAR ======== */
        .navbar {
            background: linear-gradient(90deg, #0a0b0f, #10121a);
            border-bottom: 1px solid #1f2937;
        }

        .navbar-brand {
            color: #0dcaf0 !important;
            letter-spacing: 1px;
            font-weight: bold;
        }

        /* ======== SIDEBAR ======== */
        .sidebar {
            height: 100vh;
            width: 240px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 70px;

            background: rgba(15, 15, 20, 0.92);
            backdrop-filter: blur(8px);

            border-right: 1px solid #1f2937;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.4);
        }

        .sidebar a {
            display: block;
            padding: 14px 22px;
            font-size: 1rem;
            color: #d1d5db;
            text-decoration: none;

            border-left: 3px solid transparent;
            transition: .2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #11141b;
            border-left: 3px solid #0dcaf0;
            color: #0dcaf0;
        }

        /* ======== CONTEÚDO ======== */
        .content {
            margin-left: 240px;
            padding: 30px;
            min-height: calc(100vh - 150px);
        }

        h2 {
            color: #0dcaf0;
            font-weight: 600;
            border-bottom: 1px solid #1f2937;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        /* ======== TABELA ======== */
        .table {
            background: #11141b;
            border-radius: 12px;
            overflow: hidden;
        }

        .table thead {
            background: #0d1117;
            color: #0dcaf0;
        }

        .table tbody tr:hover {
            background: rgba(13, 202, 240, 0.08);
            transition: 0.2s;
        }

        .table td, .table th {
            padding: 18px;
        }

        /* ======== RODAPÉ ======== */
        footer {
            width: calc(100% - 240px);
            margin-left: 240px;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #1f2937;
            color: #888;
            background: #0a0b0f;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark fixed-top shadow-sm">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <i class="bi bi-calendar2-event-fill me-2"></i>
            Wayne Tech — Agendamentos
        </a>

        <div class="d-flex align-items-center">
            <span class="text-light me-3">
                👋 <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>
            </span>

            <a class="btn btn-danger btn-sm" href="../sistema/logout.php">
                <i class="bi bi-box-arrow-right"></i> Sair
            </a>
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

<!-- CONTEÚDO -->
<div class="content">

    <h2>Todos os Agendamentos</h2>

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
                <!-- Carregado pelo JS -->
            </tbody>
        </table>
    </div>

</div>

<!-- RODAPÉ -->
<footer>
    © 2025 Wayne Tech — Todos os direitos reservados
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script_dados_clientes.js"></script>

</body>
</html>
