<?php
require __DIR__ . '/proteger_cliente.php';
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wayne Tech</title>

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
            color: #0dcaf0 !important;
        }

        .nav-link:hover {
            color: #0dcaf0 !important;
        }

        .carousel-item {
            height: 86vh;
            background-size: cover;
            background-position: center;
        }

        .carousel-item::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(115deg, rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.15));
        }

        .carousel-caption-custom {
            z-index: 5;
            position: absolute;
            top: 36%;
            left: 8%;
        }

        .carousel-caption-custom h1 {
            font-size: 3.2rem;
            font-weight: 700;
        }

        .carousel-caption-custom p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 450px;
        }

        .btn-hero {
            padding: 12px 30px;
            border-radius: 10px;
            font-size: 1.1rem;
        }

        .icon-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #16161d;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 18px rgba(0, 150, 255, 0.2);
            margin: 0 auto 15px;
            overflow: hidden;
            transition: 0.35s ease;
        }

        .icon-circle:hover {
            transform: translateY(-6px);
            box-shadow: 0 0 28px rgba(0, 180, 255, 0.4);
        }

        .icon-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info-card {
            background: #141418;
            border-radius: 15px;
            padding: 28px;
            border: 1px solid #23232b;
            transition: .3s;
            height: 100%;
        }

        .info-card:hover {
            border-color: #0dcaf0;
            transform: translateY(-6px);
            box-shadow: 0 0 25px rgba(13, 202, 240, 0.12);
        }

        .modal-content {
            background: #1a1a21;
            border-radius: 16px;
            border: 1px solid #2f2f39;
        }

        .btn-elegant {
            background: #0dcaf0;
            color: #0d0d12;
            text-decoration: none;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            font-size: 1rem;
        }

        .btn-elegant:hover {
            background: #feffff;
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

<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-info" href="#">Wayne Tech</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                
                <li class="nav-item"><a class="nav-link active" href="home_cliente.php" style="color: #0dcaf0;">Início</a></li>

                <li class="nav-item"><a class="nav-link" href="../servicos.php">Serviços</a></li>

                <li class="nav-item"><a class="nav-link" href="../sistema/agendamento.php">Agendamento</a></li>

            </ul>

            <span class="text-info ms-3 fw-bold">
                👋 <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>
            </span>

            <a class="btn btn-danger btn-sm ms-3" href="../sistema/logout.php">Sair</a>

        </div>
    </div>
</nav>


<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1300" style="margin-top: 55px">

    <div class="carousel-inner">

        <div class="carousel-item active" style="background-image: url('https://images.unsplash.com/photo-1511707171634-5f897ff02aa9');">
            <div class="carousel-caption-custom text-light">
                <h1>Assistência técnica rápida e confiável para seu computador</h1>
                <p>Diagnóstico gratuito e atendimento no mesmo dia.</p>
                <a href="../servicos.php" class="btn btn-primary btn-hero">AGENDAR</a>
            </div>
        </div>

        <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1517336714731-489689fd1ca8');">
            <div class="carousel-caption-custom text-light">
                <h1>Tablets de última geração</h1>
                <p>Potência e mobilidade para estudo ou trabalho.</p>
                <a href="#" class="btn btn-primary btn-hero">Ver Tablets</a>
            </div>
        </div>

        <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085');">
            <div class="carousel-caption-custom text-light">
                <h1>Notebooks poderosos</h1>
                <p>Performance premium para jogos, estudo ou profissão.</p>
                <a href="#" class="btn btn-primary btn-hero">Ver Notebooks</a>
            </div>
        </div>

    </div>

</div>

<div class="container mt-5">
    <div class="row g-4">

        <div class="col-lg-4">
            <div class="info-card text-center">
                <div class="icon-circle">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ26st4wGGqFAlkfK3VO1ftsjahZDfKDnsIhQ&s">
                </div>
                <h3>Telefone</h3>
                <p>Suporte imediato via WhatsApp e telefone fixo.</p>
                <a class="btn btn-outline-info mt-3"
                   href="https://wa.me/558399348023?text=Olá,%20vim%20do%20site%20WayneTech%20e%20quero%20saber%20mais!"
                   target="_blank">
                   Ver mais
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="info-card text-center">
                <div class="icon-circle">
                    <img src="https://thumbs.dreamstime.com/b/logotipo-gmail-novo-%C3%ADcone-de-vetorial-do-servi%C3%A7o-email-desenvolvido-pelo-google-redesenhado-vers%C3%A3o-o-arquivo-eps-est%C3%A1-201003176.jpg">
                </div>
                <h3>Email</h3>
                <p>Envie sua dúvida ou solicite orçamento por e-mail.</p>
                <a class="btn btn-outline-info mt-3" data-bs-toggle="modal" data-bs-target="#emailModal">
                    Ver mais
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="info-card text-center">
                <div class="icon-circle">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_xWIQxw7TF8-juCpuC4fkdjSlUFzMqCSduw&s">
                </div>
                <h3>Endereço</h3>
                <p>Venha visitar nossa loja física.</p>
                <a class="btn btn-outline-info mt-3" data-bs-toggle="modal" data-bs-target="#localElegantModal">
                    Ver mais
                </a>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="emailModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-light">
            <div class="modal-header">
                <h5 class="modal-title">Contato por E-mail</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>E-mail:</strong> waynetech@gmail.com</p>
                <p>Respondemos em poucas horas!</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="localElegantModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-light">
            <div class="modal-header">
                <h5 class="modal-title">Localização</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div style="font-size: 48px;">📍</div>
                <p>Clique abaixo para abrir no Google Maps:</p>

                <a href="https://www.google.com/maps/place/UNINASSAU+João+Pessoa"
                   target="_blank" class="btn-elegant mt-3">
                    Abrir no Google Maps – WayneTech Loja Física
                </a>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">
    <p class="mb-1">© 2025 Wayne Tech — Todos os direitos reservados</p>
    <a href="#" class="text-decoration-none text-secondary">Voltar ao topo</a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
