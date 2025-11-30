<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "banco_waynetech";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}
?>
