<?php
session_start();

// Caminho para o JSON
$arquivo = __DIR__ . "/../dados/usuarios.json";

// Se o arquivo não existir, cria um JSON vazio
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Carrega os usuários
$usuarios = json_decode(file_get_contents($arquivo), true);

// Dados enviados
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$usuarioEncontrado = null;

// Procura usuário
foreach ($usuarios as $u) {
    if ($u['email'] === $email && $u['senha'] === $senha) {
        $usuarioEncontrado = $u;
        break;
    }
}

if ($usuarioEncontrado) {

    $_SESSION['usuario'] = $usuarioEncontrado;

    // REDIRECIONAMENTOS
    if ($usuarioEncontrado['tipo'] === 'adm') {
        header("Location: ../admin/home_adm.php");
        exit;
    }

    if ($usuarioEncontrado['tipo'] === 'cliente') {
        header("Location: ../cliente/home_cliente.php");
        exit;
    }

} else {
    echo "<script>
        alert('Email ou senha incorretos!');
        window.location.href='../login.html';
    </script>";
}
?>
