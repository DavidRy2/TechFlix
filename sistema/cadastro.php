<?php
session_start();

// Caminho do arquivo JSON
$arquivo = __DIR__ . "/../dados/usuarios.json";

// Se não existir, cria um vazio
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Carrega os usuários existentes
$usuarios = json_decode(file_get_contents($arquivo), true);

// Recebe dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$confirmar = $_POST['confirmar'] ?? '';
$tipo = $_POST['tipo'] ?? 'cliente';

// Validação básica
if ($senha !== $confirmar) {
    echo "<script>alert('As senhas não conferem!');window.location.href='../login.html';</script>";
    exit;
}

// Verifica se email já existe
foreach ($usuarios as $u) {
    if ($u['email'] === $email) {
        echo "<script>alert('Email já cadastrado!');window.location.href='../login.html';</script>";
        exit;
    }
}

// Novo usuário
$novo = [
    "nome" => $nome,
    "email" => $email,
    "senha" => $senha,
    "tipo" => $tipo,
    "dataCadastro" => date('Y-m-d H:i:s')
];

// Adiciona ao JSON
$usuarios[] = $novo;
file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Finaliza
echo "<script>alert('Usuário cadastrado com sucesso!');window.location.href='../login.html';</script>";
exit;
?>
