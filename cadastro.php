<?php
require 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

if ($senha !== $confirmar) {
    echo "<script>alert('As senhas não conferem!');window.location.href='login.html';</script>";
    exit;
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT id FROM clientes WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->rowCount() > 0) {
    echo "<script>alert('Email já cadastrado!');window.location.href='login.html';</script>";
    exit;
}

$stmt = $pdo->prepare("INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)");

if ($stmt->execute([$nome, $email, $senhaHash])) {
    echo "<script>alert('Usuário cadastrado com sucesso!');window.location.href='login.html';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar.');window.location.href='login.html';</script>";
}
?>
