<?php
require 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$stmt = $pdo->prepare("SELECT * FROM clientes WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->rowCount() == 0) {
    echo "<script>alert('Email não encontrado!');window.location.href='login.html';</script>";
    exit;
}

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (password_verify($senha, $usuario['senha'])) {
    echo "<script>alert('Login realizado com sucesso!');window.location.href='home_cliente.html';</script>";
} else {
    echo "<script>alert('Senha incorreta!');window.location.href='login.html';</script>";
}
?>
